<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Rutas de almacenamiento
    |--------------------------------------------------------------------------
    |
    | Define los discos de almacenamiento disponibles
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        // Almacenamiento para avatares de usuarios
        'avatars' => [
            'driver' => 'local',
            'root' => storage_path('app/public/avatars'),
            'url' => env('APP_URL').'/storage/avatars',
            'visibility' => 'public',
        ],

        // Almacenamiento para imágenes de maquinaria
        'maquinaria' => [
            'driver' => 'local',
            'root' => storage_path('app/public/maquinaria'),
            'url' => env('APP_URL').'/storage/maquinaria',
            'visibility' => 'public',
        ],

        // Almacenamiento para imágenes de proyectos
        'proyectos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proyectos'),
            'url' => env('APP_URL').'/storage/proyectos',
            'visibility' => 'public',
        ],

        // Almacenamiento para documentos
        'documentos' => [
            'driver' => 'local',
            'root' => storage_path('app/documentos'),
            'visibility' => 'private',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Enlaces simbólicos
    |--------------------------------------------------------------------------
    |
    | Enlaces que se crearán con php artisan storage:link
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
