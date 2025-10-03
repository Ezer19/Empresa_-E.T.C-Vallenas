<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Mostrar listado de servicios
     */
    public function index(Request $request)
    {
        $query = Servicio::where('estado', 'activo');

        // Filtrar por tipo
        if ($request->has('tipo') && $request->tipo) {
            $query->where('tipo', $request->tipo);
        }

        // Filtrar por categoría
        if ($request->has('categoria') && $request->categoria) {
            $query->where('categoria', $request->categoria);
        }

        $servicios = $query->ordered()->paginate(12);
        
        // Obtener tipos para filtros
        $tipos = Servicio::distinct('tipo')->pluck('tipo');

        return view('servicios.index', compact('servicios', 'tipos'));
    }

    /**
     * Mostrar detalle de servicio
     */
    public function show($id)
    {
        $servicio = Servicio::where('estado', 'activo')->findOrFail($id);
        
        // Servicios relacionados
        $relacionados = Servicio::where('tipo', $servicio->tipo)
            ->where('_id', '!=', $id)
            ->where('estado', 'activo')
            ->limit(3)
            ->get();

        return view('servicios.detalle', compact('servicio', 'relacionados'));
    }

    /**
     * Crear nuevo servicio (Admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'descripcion_corta' => 'required|string|max:500',
            'precio_base' => 'nullable|numeric|min:0',
        ], [
            'nombre.required' => 'El nombre del servicio es obligatorio',
            'tipo.required' => 'El tipo de servicio es obligatorio',
            'descripcion_corta.required' => 'La descripción corta es obligatoria',
            'descripcion_corta.max' => 'La descripción corta no debe superar 500 caracteres',
        ]);

        // Generar código único
        $codigo = 'SER-' . strtoupper(substr($request->tipo, 0, 3)) . '-' . str_pad(Servicio::count() + 1, 4, '0', STR_PAD_LEFT);

        $data = $request->all();
        $data['codigo'] = $codigo;
        $data['estado'] = $data['estado'] ?? 'activo';
        $data['disponibilidad'] = $data['disponibilidad'] ?? 'disponible';
        $data['moneda'] = $data['moneda'] ?? 'PEN';
        $data['popularidad'] = 0;

        $servicio = Servicio::create($data);

        return redirect()->route('admin.servicios')
            ->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Actualizar servicio (Admin)
     */
    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
        ]);

        $servicio->update($request->all());

        return redirect()->route('admin.servicios')
            ->with('success', 'Servicio actualizado exitosamente.');
    }

    /**
     * Eliminar servicio (Admin)
     */
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return redirect()->route('admin.servicios')
            ->with('success', 'Servicio eliminado exitosamente.');
    }

    /**
     * Incrementar popularidad
     */
    public function incrementarPopularidad($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->increment('popularidad');
        
        return response()->json(['success' => true]);
    }
}
