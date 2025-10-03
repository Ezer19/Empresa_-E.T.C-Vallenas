<?php

namespace App\Http\Controllers;

use App\Models\Maquinaria;
use App\Models\Proyecto;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $stats = [
            'total_maquinaria' => Maquinaria::count(),
            'maquinaria_disponible' => Maquinaria::where('disponibilidad', 'disponible')->count(),
            'maquinaria_alquilada' => Maquinaria::where('disponibilidad', 'alquilado')->count(),
            'total_proyectos' => Proyecto::count(),
            'proyectos_activos' => Proyecto::where('estado', 'en_progreso')->count(),
            'proyectos_completados' => Proyecto::where('estado', 'completado')->count(),
            'total_clientes' => Usuario::where('rol', 'cliente')->count(),
            'total_servicios' => Servicio::count(),
        ];

        // Proyectos recientes
        $proyectos_recientes = Proyecto::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Maquinaria que necesita mantenimiento
        $mantenimiento_pendiente = Maquinaria::where('proxima_mantenimiento', '<=', now()->addDays(7))
            ->get();

        return view('admin.index', compact(
            'stats',
            'proyectos_recientes',
            'mantenimiento_pendiente'
        ));
    }

    public function gestionUsuarios()
    {
        $usuarios = Usuario::paginate(20);
        return view('admin.gestion-usuarios', compact('usuarios'));
    }

    public function gestionMaquinaria()
    {
        $maquinaria = Maquinaria::paginate(20);
        return view('admin.gestion-maquinaria', compact('maquinaria'));
    }

    public function gestionProyectos()
    {
        $proyectos = Proyecto::with('responsable')->paginate(20);
        return view('admin.gestion-proyectos', compact('proyectos'));
    }

    public function gestionServicios()
    {
        $servicios = Servicio::paginate(20);
        return view('admin.gestion-servicios', compact('servicios'));
    }

    public function reportes(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio', now()->subMonth());
        $fecha_fin = $request->input('fecha_fin', now());

        // Estadísticas del período
        $stats_periodo = [
            'proyectos_nuevos' => Proyecto::whereBetween('created_at', [$fecha_inicio, $fecha_fin])->count(),
            'ingresos_estimados' => Proyecto::whereBetween('created_at', [$fecha_inicio, $fecha_fin])
                ->sum('presupuesto'),
            'clientes_nuevos' => Usuario::where('rol', 'cliente')
                ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
                ->count(),
        ];

        return view('admin.reportes', compact('stats_periodo', 'fecha_inicio', 'fecha_fin'));
    }
}
