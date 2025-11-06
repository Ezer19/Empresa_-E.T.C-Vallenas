<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Proyecto;
use App\Models\Usuario;

class ProyectosSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Usuario::where('rol', 'admin')->first();

        $proyectos = [
            [
                'codigo' => 'PROY-2024-0001',
                'nombre' => 'Carretera Cusco - Pisac',
                'tipo' => 'infraestructura',
                'descripcion' => 'Construcción y asfaltado de 45 km de carretera entre Cusco y Pisac',
                'cliente' => 'Ministerio de Transportes y Comunicaciones',
                'ubicacion' => 'Cusco - Pisac, Perú',
                'coordenadas' => [
                    'lat' => -13.4219,
                    'lng' => -71.9680
                ],
                'fecha_inicio' => Carbon::now()->subMonths(6),
                'fecha_estimada_fin' => Carbon::now()->addMonths(6),
                'estado' => 'en_progreso',
                'avance_porcentaje' => 65,
                'presupuesto' => 15000000,
                'costo_actual' => 9500000,
                'moneda' => 'PEN',
                'responsable_id' => optional($admin)->id,
                'responsable_nombre' => optional($admin)->nombre . ' ' . optional($admin)->apellido,
                'equipo' => [
                    ['nombre' => 'Carlos Mendoza', 'cargo' => 'Jefe de Proyecto'],
                    ['nombre' => 'Ana Torres', 'cargo' => 'Ingeniera Civil'],
                    ['nombre' => 'Luis Vargas', 'cargo' => 'Supervisor de Obra'],
                ],
                'hitos' => [
                    ['nombre' => 'Movilización', 'fecha' => Carbon::now()->subMonths(6), 'completado' => true],
                    ['nombre' => 'Movimiento de tierras', 'fecha' => Carbon::now()->subMonths(4), 'completado' => true],
                    ['nombre' => 'Base y sub-base', 'fecha' => Carbon::now()->subMonths(2), 'completado' => true],
                    ['nombre' => 'Asfaltado', 'fecha' => Carbon::now()->addMonths(2), 'completado' => false],
                    ['nombre' => 'Señalización', 'fecha' => Carbon::now()->addMonths(5), 'completado' => false],
                ],
            ],
            [
                'codigo' => 'PROY-2024-0002',
                'nombre' => 'Mina Cerro Verde - Expansión',
                'tipo' => 'mineria',
                'descripcion' => 'Movimiento de tierras y preparación de plataformas para expansión minera',
                'cliente' => 'Compañía Minera Cerro Verde',
                'ubicacion' => 'Arequipa, Perú',
                'coordenadas' => [
                    'lat' => -16.4897,
                    'lng' => -71.6517
                ],
                'fecha_inicio' => Carbon::now()->subMonths(3),
                'fecha_estimada_fin' => Carbon::now()->addMonths(9),
                'estado' => 'en_progreso',
                'avance_porcentaje' => 40,
                'presupuesto' => 8500000,
                'costo_actual' => 3200000,
                'moneda' => 'PEN',
                'responsable_id' => $admin->_id,
                'responsable_nombre' => $admin->nombre_completo,
            ],
            [
                'codigo' => 'PROY-2023-0015',
                'nombre' => 'Centro Comercial Plaza Norte',
                'tipo' => 'construccion',
                'descripcion' => 'Excavación y movimiento de tierras para construcción de centro comercial',
                'cliente' => 'Inversiones Inmobiliarias SAC',
                'ubicacion' => 'Lima, Perú',
                'coordenadas' => [
                    'lat' => -12.0464,
                    'lng' => -77.0428
                ],
                'fecha_inicio' => Carbon::now()->subMonths(12),
                'fecha_estimada_fin' => Carbon::now()->subMonths(2),
                'fecha_fin' => Carbon::now()->subMonths(2),
                'estado' => 'completado',
                'avance_porcentaje' => 100,
                'presupuesto' => 2500000,
                'costo_actual' => 2350000,
                'moneda' => 'PEN',
                'responsable_id' => $admin->_id,
                'responsable_nombre' => $admin->nombre_completo,
            ],
        ];

        foreach ($proyectos as $proyecto) {
            Proyecto::create($proyecto);
        }

        $this->command->info('Proyectos creados exitosamente');
    }
}
