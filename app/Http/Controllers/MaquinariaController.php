<?php

namespace App\Http\Controllers;

use App\Models\Maquinaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaquinariaController extends Controller
{
    /**
     * Mostrar listado de maquinaria
     */
    public function index(Request $request)
    {
        $query = Maquinaria::query();

        // Filtrar por tipo
        if ($request->has('tipo') && $request->tipo) {
            $query->where('tipo', $request->tipo);
        }

        // Filtrar por disponibilidad
        if ($request->has('disponibilidad') && $request->disponibilidad) {
            $query->where('disponibilidad', $request->disponibilidad);
        }

        // Buscar por nombre
        if ($request->has('buscar') && $request->buscar) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }

        // Ordenar
        $ordenar = $request->get('ordenar', 'nombre');
        $direccion = $request->get('direccion', 'asc');
        $query->orderBy($ordenar, $direccion);

        $maquinaria = $query->paginate(12);
        
        // Obtener tipos únicos para el filtro
        $tipos = Maquinaria::distinct('tipo')->pluck('tipo');

        return view('maquinaria.index', compact('maquinaria', 'tipos'));
    }

    /**
     * Mostrar detalle de maquinaria
     */
    public function show($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        
        // Maquinaria relacionada del mismo tipo
        $relacionadas = Maquinaria::where('tipo', $maquinaria->tipo)
            ->where('_id', '!=', $id)
            ->where('disponibilidad', 'disponible')
            ->limit(4)
            ->get();

        return view('maquinaria.detalle', compact('maquinaria', 'relacionadas'));
    }

    /**
     * Crear nueva maquinaria (Admin)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'año' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'tarifa_hora' => 'nullable|numeric|min:0',
            'tarifa_dia' => 'nullable|numeric|min:0',
            'imagenes.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'tipo.required' => 'El tipo es obligatorio',
            'marca.required' => 'La marca es obligatoria',
            'modelo.required' => 'El modelo es obligatorio',
            'año.required' => 'El año es obligatorio',
            'año.integer' => 'El año debe ser un número',
            'imagenes.*.image' => 'Los archivos deben ser imágenes',
            'imagenes.*.max' => 'Las imágenes no deben superar 5MB',
        ]);

        // Generar código único
        $codigo = 'MAQ-' . strtoupper(substr($request->tipo, 0, 3)) . '-' . str_pad(Maquinaria::count() + 1, 4, '0', STR_PAD_LEFT);

        $data = $request->except('imagenes');
        $data['codigo'] = $codigo;
        $data['estado'] = $data['estado'] ?? 'operativo';
        $data['disponibilidad'] = $data['disponibilidad'] ?? 'disponible';

        // Procesar imágenes
        if ($request->hasFile('imagenes')) {
            $imagenes = [];
            foreach ($request->file('imagenes') as $imagen) {
                $path = $imagen->store('maquinaria', 'public');
                $imagenes[] = basename($path);
            }
            $data['imagenes'] = $imagenes;
        }

        $maquinaria = Maquinaria::create($data);

        return redirect()->route('admin.maquinaria')
            ->with('success', 'Maquinaria creada exitosamente.');
    }

    /**
     * Actualizar maquinaria (Admin)
     */
    public function update(Request $request, $id)
    {
        $maquinaria = Maquinaria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
        ]);

        $data = $request->except('imagenes');

        // Procesar nuevas imágenes si se suben
        if ($request->hasFile('imagenes')) {
            $imagenes = $maquinaria->imagenes ?? [];
            foreach ($request->file('imagenes') as $imagen) {
                $path = $imagen->store('maquinaria', 'public');
                $imagenes[] = basename($path);
            }
            $data['imagenes'] = $imagenes;
        }

        $maquinaria->update($data);

        return redirect()->route('admin.maquinaria')
            ->with('success', 'Maquinaria actualizada exitosamente.');
    }

    /**
     * Eliminar maquinaria (Admin)
     */
    public function destroy($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);

        // Eliminar imágenes del storage
        if ($maquinaria->imagenes) {
            foreach ($maquinaria->imagenes as $imagen) {
                Storage::disk('public')->delete('maquinaria/' . $imagen);
            }
        }

        $maquinaria->delete();

        return redirect()->route('admin.maquinaria')
            ->with('success', 'Maquinaria eliminada exitosamente.');
    }
}
