<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
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