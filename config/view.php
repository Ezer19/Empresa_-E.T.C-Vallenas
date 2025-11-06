<?php

return [
    // Rutas donde Laravel buscará las vistas Blade
    'paths' => [
        resource_path('views'),
    ],

    // Carpeta donde se almacenan las vistas compiladas
    'compiled' => env('VIEW_COMPILED_PATH', realpath(storage_path('framework/views'))),
];
