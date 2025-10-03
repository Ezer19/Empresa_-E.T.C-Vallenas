<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Procesar login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingrese un correo electrónico válido',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            
            // Actualizar último login
            Auth::user()->update(['last_login_at' => now()]);
            
            // Redirigir según rol
            if (Auth::user()->isAdmin()) {
                return redirect()->intended('/admin');
            }
            
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput();
    }

    /**
     * Mostrar formulario de registro
     */
    public function showRegister()
    {
        return view('auth.registro');
    }

    /**
     * Procesar registro
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'telefono' => 'required|string|max:20',
            'password' => 'required|min:6|confirmed',
            'empresa' => 'nullable|string|max:255',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingrese un correo electrónico válido',
            'email.unique' => 'Este correo electrónico ya está registrado',
            'telefono.required' => 'El teléfono es obligatorio',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Crear nuevo usuario
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'empresa' => $request->empresa,
            'password' => Hash::make($request->password),
            'rol' => 'cliente', // Rol por defecto
            'estado' => 'activo',
        ]);

        // Login automático
        Auth::login($usuario);

        return redirect('/dashboard')->with('success', '¡Registro exitoso! Bienvenido a ETC Vallenas.');
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Sesión cerrada exitosamente.');
    }

    /**
     * Mostrar formulario de recuperación de contraseña
     */
    public function showForgotPassword()
    {
        return view('auth.recuperar');
    }

    /**
     * Enviar email de recuperación
     */
    public function sendResetLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:usuarios,email',
        ], [
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'Ingrese un correo electrónico válido',
            'email.exists' => 'No encontramos una cuenta con este correo electrónico',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // TODO: Implementar envío de email con token de recuperación
        
        return back()->with('success', 'Se ha enviado un enlace de recuperación a tu correo electrónico.');
    }
}
