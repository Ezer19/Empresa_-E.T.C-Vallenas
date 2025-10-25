<?php

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServiciosSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            [
                'codigo' => 'SER-ALQ-0001',
                'nombre' => 'Alquiler de Maquinaria Pesada',
                'tipo' => 'alquiler',
                'categoria' => 'principal',
                'descripcion_corta' => 'Alquiler de equipos de construcción y minería con operadores certificados',
                'descripcion_larga' => 'Ofrecemos una amplia flota de maquinaria pesada para alquiler con operadores altamente capacitados. Nuestros equipos están en óptimas condiciones y cumplen con todos los estándares de seguridad.',
                'precio_base' => 120,
                'precio_hora' => 150,
                'precio_dia' => 1000,
                'precio_semana' => 6000,
                'precio_mes' => 22000,
                'moneda' => 'PEN',
                'disponibilidad' => 'disponible',
                'estado' => 'activo',
                'destacado' => true,
                'caracteristicas' => [
                    'Operadores certificados',
                    'Equipos en óptimas condiciones',
                    'Seguro incluido',
                    'Soporte técnico 24/7',
                    'Mantenimiento preventivo',
                    'Flexibilidad en horarios'
                ],
                'beneficios' => [
                    'Reducción de costos operativos',
                    'Sin inversión inicial',
                    'Mantenimiento incluido',
                    'Actualización constante de equipos'
                ],
                'requisitos' => [
                    'RUC o DNI',
                    'Garantía o carta fianza',
                    'Contrato firmado',
                    'Seguro de responsabilidad civil'
                ],
            ],
            [
                'codigo' => 'SER-MAN-0001',
                'nombre' => 'Mantenimiento y Reparación',
                'tipo' => 'mantenimiento',
                'categoria' => 'principal',
                'descripcion_corta' => 'Servicio técnico especializado para maquinaria pesada',
                'descripcion_larga' => 'Realizamos mantenimiento preventivo y correctivo de todo tipo de maquinaria pesada. Contamos con técnicos certificados y repuestos originales.',
                'precio_base' => 80,
                'precio_hora' => 100,
                'moneda' => 'PEN',
                'disponibilidad' => 'disponible',
                'estado' => 'activo',
                'destacado' => true,
                'caracteristicas' => [
                    'Técnicos certificados',
                    'Repuestos originales',
                    'Diagnóstico computarizado',
                    'Servicio en sitio',
                    'Garantía en reparaciones',
                    'Atención 24/7'
                ],
                'beneficios' => [
                    'Mayor vida útil de equipos',
                    'Reducción de tiempos muertos',
                    'Ahorro en costos de reparación',
                    'Historial de mantenimiento digital'
                ],
            ],
            [
                'codigo' => 'SER-CON-0001',
                'nombre' => 'Construcción de Obras',
                'tipo' => 'construccion',
                'categoria' => 'principal',
                'descripcion_corta' => 'Ejecución de proyectos de construcción civil y minería',
                'descripcion_larga' => 'Ejecutamos proyectos de construcción de carreteras, edificaciones, movimiento de tierras y obras civiles. Contamos con personal calificado y equipos modernos.',
                'precio_base' => null,
                'moneda' => 'PEN',
                'disponibilidad' => 'disponible',
                'estado' => 'activo',
                'destacado' => true,
                'caracteristicas' => [
                    'Personal calificado',
                    'Equipos propios',
                    'Gestión de proyectos',
                    'Control de calidad',
                    'Cumplimiento de plazos',
                    'Certificaciones ISO'
                ],
                'beneficios' => [
                    'Experiencia en proyectos complejos',
                    'Recursos propios',
                    'Gestión integral',
                    'Garantía de obra'
                ],
            ],
            [
                'codigo' => 'SER-TRA-0001',
                'nombre' => 'Transporte de Maquinaria',
                'tipo' => 'transporte',
                'categoria' => 'complementario',
                'descripcion_corta' => 'Transporte seguro de maquinaria pesada a nivel nacional',
                'descripcion_larga' => 'Servicio de transporte especializado para maquinaria pesada con camas bajas y equipos especializados. Cobertura a nivel nacional.',
                'precio_base' => 200,
                'moneda' => 'PEN',
                'disponibilidad' => 'disponible',
                'estado' => 'activo',
                'destacado' => false,
                'caracteristicas' => [
                    'Camas bajas especializadas',
                    'Permisos y autorizaciones',
                    'Seguro de carga',
                    'Personal capacitado',
                    'Cobertura nacional',
                    'Rastreo GPS'
                ],
            ],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }

        $this->command->info('✓ Servicios creados exitosamente');
    }
}