<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Mostrar dashboard del usuario
     */
    public function dashboard()
    {
        $usuario = auth()->user();
        
        // Estadísticas del usuario
        $stats = [
            'proyectos_asignados' => $usuario->proyectos()->count(),
            'proyectos_activos' => $usuario->proyectos()->where('estado', 'en_progreso')->count(),
        ];

        return view('usuarios.dashboard', compact('usuario', 'stats'));
    }

    /**
     * Mostrar perfil del usuario
     */
    public function perfil()
    {
        $usuario = auth()->user();
        return view('usuarios.perfil', compact('usuario'));
    }

    /**
     * Actualizar perfil
     */
    public function actualizarPerfil(Request $request)
    {
        $usuario = auth()->user();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'empresa' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'avatar.image' => 'El archivo debe ser una imagen',
            'avatar.max' => 'La imagen no debe superar 2MB',
        ]);

        $data = $request->only(['nombre', 'apellido', 'telefono', 'empresa', 'cargo']);

        // Procesar avatar si se sube
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '_' . $usuario->_id . '.' . $avatar->extension();
            $avatar->storeAs('avatars', $filename, 'public');
            $data['avatar'] = $filename;
        }

        $usuario->update($data);

        return back()->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Cambiar contraseña
     */
    public function cambiarPassword(Request $request)
    {
        $request->validate([
            'password_actual' => 'required',
            'password' => 'required|min:6|confirmed',
        ], [
            'password_actual.required' => 'La contraseña actual es obligatoria',
            'password.required' => 'La nueva contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        $usuario = auth()->user();

        // Verificar contraseña actual
        if (!Hash::check($request->password_actual, $usuario->password)) {
            return back()->withErrors(['password_actual' => 'La contraseña actual es incorrecta']);
        }

        $usuario->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Contraseña actualizada exitosamente.');
    }

    /**
     * Configuración del usuario
     */
    public function configuracion()
    {
        $usuario = auth()->user();
        return view('usuarios.configuracion', compact('usuario'));
    }

    /**
     * Actualizar configuración
     */
    public function actualizarConfiguracion(Request $request)
    {
        $usuario = auth()->user();

        $preferencias = [
            'notificaciones_email' => $request->boolean('notificaciones_email'),
            'notificaciones_sms' => $request->boolean('notificaciones_sms'),
            'idioma' => $request->input('idioma', 'es'),
            'tema' => $request->input('tema', 'light'),
        ];

        $usuario->update([
            'preferencias' => $preferencias,
        ]);

        return back()->with('success', 'Configuración actualizada exitosamente.');
    }

    /**
     * Gestión de usuarios (Admin)
     */
    public function index(Request $request)
    {
        $query = Usuario::query();

        // Filtrar por rol
        if ($request->has('rol') && $request->rol) {
            $query->where('rol', $request->rol);
        }

        // Buscar
        if ($request->has('buscar') && $request->buscar) {
            $buscar = $request->buscar;
            $query->where(function($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('apellido', 'like', "%{$buscar}%")
                  ->orWhere('email', 'like', "%{$buscar}%");
            });
        }

        $usuarios = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.gestion-usuarios', compact('usuarios'));
    }

    /**
     * Actualizar usuario (Admin)
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id . ',_id',
            'rol' => 'required|in:cliente,operador,admin,superadmin',
            'estado' => 'required|in:activo,inactivo,suspendido',
        ]);

        $usuario->update($request->all());

        return back()->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Eliminar usuario (Admin)
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        
        // No permitir eliminar al usuario actual
        if ($usuario->_id == auth()->id()) {
            return back()->withErrors(['error' => 'No puedes eliminar tu propia cuenta.']);
        }

        $usuario->delete();

        return back()->with('success', 'Usuario eliminado exitosamente.');
    }
}
