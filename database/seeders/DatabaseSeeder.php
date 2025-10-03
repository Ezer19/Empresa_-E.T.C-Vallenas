<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecutar los seeders de la base de datos.
     */
    public function run(): void
    {
        $this->call([
            UsuariosSeeder::class,
            MaquinariaSeeder::class,
            ServiciosSeeder::class,
            ProyectosSeeder::class,
        ]);
    }
}
