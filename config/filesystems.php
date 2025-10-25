<?php

return [
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

        'avatars' => [
            'driver' => 'local',
            'root' => storage_path('app/public/avatars'),
            'url' => env('APP_URL').'/storage/avatars',
            'visibility' => 'public',
        ],

        'maquinaria' => [
            'driver' => 'local',
            'root' => storage_path('app/public/maquinaria'),
            'url' => env('APP_URL').'/storage/maquinaria',
            'visibility' => 'public',
        ],

        'proyectos' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proyectos'),
            'url' => env('APP_URL').'/storage/proyectos',
            'visibility' => 'public',
        ],

        'documentos' => [
            'driver' => 'local',
            'root' => storage_path('app/documentos'),
            'visibility' => 'private',
        ],
    ],

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],
];