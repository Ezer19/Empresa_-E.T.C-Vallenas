<?php

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Ejecutar el seeder de usuarios.
     */
    public function run(): void
    {
        // Superadministrador
        Usuario::create([
            'nombre' => 'Fernando',
            'apellido' => 'Vallenas',
            'email' => 'vallenasfernando43@gmail.com',
            'telefono' => '+51984123456',
            'password' => Hash::make('admin123'),
            'rol' => 'superadmin',
            'estado' => 'activo',
            'empresa' => 'ETC Vallenas',
            'cargo' => 'Director General',
            'verificado' => true,
            'verificado_at' => now(),
        ]);

        // Administrador
        Usuario::create([
            'nombre' => 'Carlos',
            'apellido' => 'Mendoza',
            'email' => 'admin@etcvallenas.com',
            'telefono' => '+51987654321',
            'password' => Hash::make('admin123'),
            'rol' => 'admin',
            'estado' => 'activo',
            'empresa' => 'ETC Vallenas',
            'cargo' => 'Gerente de Operaciones',
            'verificado' => true,
            'verificado_at' => now(),
        ]);

        // Operador
        Usuario::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'operador@etcvallenas.com',
            'telefono' => '+51976543210',
            'password' => Hash::make('operador123'),
            'rol' => 'operador',
            'estado' => 'activo',
            'empresa' => 'ETC Vallenas',
            'cargo' => 'Operador de Maquinaria',
            'verificado' => true,
            'verificado_at' => now(),
        ]);

        // Cliente de prueba
        Usuario::create([
            'nombre' => 'María',
            'apellido' => 'García',
            'email' => 'cliente@example.com',
            'telefono' => '+51965432109',
            'password' => Hash::make('cliente123'),
            'rol' => 'cliente',
            'estado' => 'activo',
            'empresa' => 'Constructora ABC SAC',
            'cargo' => 'Jefe de Proyectos',
            'verificado' => true,
            'verificado_at' => now(),
        ]);

        $this->command->info('✓ Usuarios creados exitosamente');
    }
}
