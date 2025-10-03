<?php

use Illuminate\Database\Seeder;
use App\Models\Maquinaria;

class MaquinariaSeeder extends Seeder
{
    /**
     * Ejecutar el seeder de maquinaria.
     */
    public function run(): void
    {
        $maquinaria = [
            // Excavadoras
            [
                'codigo' => 'MAQ-EXC-0001',
                'nombre' => 'Excavadora Hidráulica CAT 320',
                'tipo' => 'excavadora',
                'marca' => 'Caterpillar',
                'modelo' => '320',
                'año' => 2022,
                'descripcion' => 'Excavadora hidráulica de 20 toneladas, ideal para construcción y minería',
                'capacidad' => '20 toneladas',
                'potencia' => '121 HP',
                'peso' => '20,000 kg',
                'dimensiones' => '9.5m x 2.8m x 3.1m',
                'disponibilidad' => 'disponible',
                'estado' => 'operativo',
                'tarifa_hora' => 180,
                'tarifa_dia' => 1200,
                'tarifa_semana' => 7500,
                'tarifa_mes' => 28000,
                'moneda' => 'PEN',
                'caracteristicas' => ['GPS', 'Aire acondicionado', 'Cabina cerrada', 'Bajo consumo'],
                'imagenes' => ['excavadora-cat-320.jpg'],
            ],
            [
                'codigo' => 'MAQ-EXC-0002',
                'nombre' => 'Excavadora Volvo EC210',
                'tipo' => 'excavadora',
                'marca' => 'Volvo',
                'modelo' => 'EC210',
                'año' => 2021,
                'descripcion' => 'Excavadora de última generación con tecnología ECO',
                'capacidad' => '21 toneladas',
                'potencia' => '145 HP',
                'peso' => '21,500 kg',
                'dimensiones' => '10m x 3m x 3.2m',
                'disponibilidad' => 'disponible',
                'estado' => 'operativo',
                'tarifa_hora' => 190,
                'tarifa_dia' => 1300,
                'tarifa_semana' => 8000,
                'tarifa_mes' => 30000,
                'moneda' => 'PEN',
                'caracteristicas' => ['Sistema ECO', 'Cámara 360°', 'Monitor LED', 'Sistema hidráulico avanzado'],
                'imagenes' => ['excavadora-volvo-ec210.jpg'],
            ],
            
            // Cargadores
            [
                'codigo' => 'MAQ-CAR-0001',
                'nombre' => 'Cargador Frontal CAT 950',
                'tipo' => 'cargador',
                'marca' => 'Caterpillar',
                'modelo' => '950',
                'año' => 2023,
                'descripcion' => 'Cargador frontal de ruedas para movimiento de tierras',
                'capacidad' => '3.5 m³',
                'potencia' => '195 HP',
                'peso' => '17,000 kg',
                'dimensiones' => '8m x 2.9m x 3.5m',
                'disponibilidad' => 'disponible',
                'estado' => 'operativo',
                'tarifa_hora' => 160,
                'tarifa_dia' => 1100,
                'tarifa_semana' => 6800,
                'tarifa_mes' => 25000,
                'moneda' => 'PEN',
                'caracteristicas' => ['Cucharón estándar', 'Transmisión automática', 'Luces LED', 'Radio bidireccional'],
                'imagenes' => ['cargador-cat-950.jpg'],
            ],
            
            // Volquetes
            [
                'codigo' => 'MAQ-VOL-0001',
                'nombre' => 'Volquete Volvo FM 440',
                'tipo' => 'volquete',
                'marca' => 'Volvo',
                'modelo' => 'FM 440',
                'año' => 2022,
                'descripcion' => 'Volquete pesado de 25 m³ para transporte de materiales',
                'capacidad' => '25 m³',
                'potencia' => '440 HP',
                'peso' => '18,000 kg',
                'dimensiones' => '9m x 2.5m x 3.8m',
                'disponibilidad' => 'disponible',
                'estado' => 'operativo',
                'tarifa_hora' => 140,
                'tarifa_dia' => 950,
                'tarifa_semana' => 5800,
                'tarifa_mes' => 22000,
                'moneda' => 'PEN',
                'caracteristicas' => ['Tolva reforzada', 'Sistema hidráulico', 'Frenos ABS', 'Cabina ergonómica'],
                'imagenes' => ['volquete-volvo-fm440.jpg'],
            ],
            
            // Motoniveladoras
            [
                'codigo' => 'MAQ-MOT-0001',
                'nombre' => 'Motoniveladora CAT 140',
                'tipo' => 'motoniveladora',
                'marca' => 'Caterpillar',
                'modelo' => '140',
                'año' => 2021,
                'descripcion' => 'Motoniveladora para nivelación de terrenos y carreteras',
                'capacidad' => '3.7m ancho de hoja',
                'potencia' => '165 HP',
                'peso' => '15,900 kg',
                'dimensiones' => '8.8m x 2.6m x 3.4m',
                'disponibilidad' => 'disponible',
                'estado' => 'operativo',
                'tarifa_hora' => 170,
                'tarifa_dia' => 1150,
                'tarifa_semana' => 7000,
                'tarifa_mes' => 26500,
                'moneda' => 'PEN',
                'caracteristicas' => ['Hoja de acero', 'Articulación central', 'Control preciso', 'Sistema GPS'],
                'imagenes' => ['motoniveladora-cat-140.jpg'],
            ],
            
            // Compactadoras
            [
                'codigo' => 'MAQ-COM-0001',
                'nombre' => 'Rodillo Compactador Hamm 3411',
                'tipo' => 'compactadora',
                'marca' => 'Hamm',
                'modelo' => '3411',
                'año' => 2023,
                'descripcion' => 'Rodillo compactador vibratorio para asfalto y suelos',
                'capacidad' => '2.1m ancho de rodillo',
                'potencia' => '98 HP',
                'peso' => '11,500 kg',
                'dimensiones' => '5.2m x 2.1m x 3m',
                'disponibilidad' => 'disponible',
                'estado' => 'operativo',
                'tarifa_hora' => 120,
                'tarifa_dia' => 850,
                'tarifa_semana' => 5200,
                'tarifa_mes' => 19500,
                'moneda' => 'PEN',
                'caracteristicas' => ['Vibración ajustable', 'Sistema de riego', 'Bajo nivel de ruido', 'Fácil mantenimiento'],
                'imagenes' => ['compactadora-hamm-3411.jpg'],
            ],
        ];

        foreach ($maquinaria as $equipo) {
            Maquinaria::create($equipo);
        }

        $this->command->info('✓ Maquinaria creada exitosamente');
    }
}
