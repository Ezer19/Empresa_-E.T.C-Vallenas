<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Maquinaria;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Mostrar listado de proyectos
     */
    public function index(Request $request)
    {
        $query = Proyecto::with('responsable');

        // Filtrar por tipo
        if ($request->has('tipo') && $request->tipo) {
            $query->where('tipo', $request->tipo);
        }

        // Filtrar por estado
        if ($request->has('estado') && $request->estado) {
            $query->where('estado', $request->estado);
        }

        // Buscar por nombre
        if ($request->has('buscar') && $request->buscar) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }

        $proyectos = $query->orderBy('created_at', 'desc')->paginate(12);
        
        // Obtener tipos para filtros
        $tipos = Proyecto::distinct('tipo')->pluck('tipo');

        return view('proyectos.index', compact('proyectos', 'tipos'));
    }

    /**
     * Mostrar detalle de proyecto
     */
    public function show($id)
    {
        $proyecto = Proyecto::with('responsable', 'maquinaria')->findOrFail($id);
        
        // Proyectos relacionados
        $relacionados = Proyecto::where('tipo', $proyecto->tipo)
            ->where('_id', '!=', $id)
            ->limit(3)
            ->get();

        return view('proyectos.detalle', compact('proyecto', 'relacionados'));
    }

    /**
     * Crear nuevo proyecto (Admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'cliente' => 'required|string|max:255',
            'ubicacion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_estimada_fin' => 'required|date|after:fecha_inicio',
            'presupuesto' => 'nullable|numeric|min:0',
        ], [
            'nombre.required' => 'El nombre del proyecto es obligatorio',
            'tipo.required' => 'El tipo de proyecto es obligatorio',
            'cliente.required' => 'El nombre del cliente es obligatorio',
            'ubicacion.required' => 'La ubicación es obligatoria',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria',
            'fecha_estimada_fin.required' => 'La fecha estimada de fin es obligatoria',
            'fecha_estimada_fin.after' => 'La fecha de fin debe ser posterior a la fecha de inicio',
        ]);

        // Generar código único
        $codigo = 'PROY-' . date('Y') . '-' . str_pad(Proyecto::count() + 1, 4, '0', STR_PAD_LEFT);

        $data = $request->all();
        $data['codigo'] = $codigo;
        $data['estado'] = $data['estado'] ?? 'planificacion';
        $data['responsable_id'] = auth()->id();
        $data['responsable_nombre'] = auth()->user()->nombre_completo;
        $data['moneda'] = $data['moneda'] ?? 'PEN';
        $data['avance_porcentaje'] = 0;

        $proyecto = Proyecto::create($data);

        return redirect()->route('admin.proyectos')
            ->with('success', 'Proyecto creado exitosamente.');
    }

    /**
     * Actualizar proyecto (Admin)
     */
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'estado' => 'required|string',
        ]);

        $proyecto->update($request->all());

        return redirect()->route('admin.proyectos')
            ->with('success', 'Proyecto actualizado exitosamente.');
    }

    /**
     * Eliminar proyecto (Admin)
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('admin.proyectos')
            ->with('success', 'Proyecto eliminado exitosamente.');
    }

    /**
     * Actualizar avance del proyecto
     */
    public function actualizarAvance(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $request->validate([
            'avance_porcentaje' => 'required|integer|min:0|max:100',
        ]);

        $proyecto->update([
            'avance_porcentaje' => $request->avance_porcentaje,
        ]);

        // Si el avance es 100%, marcar como completado
        if ($request->avance_porcentaje == 100) {
            $proyecto->update([
                'estado' => 'completado',
                'fecha_fin' => now(),
            ]);
        }

        return back()->with('success', 'Avance actualizado exitosamente.');
    }
}
