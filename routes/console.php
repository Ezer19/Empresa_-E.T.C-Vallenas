<?php

/**
 * Archivo de rutas para comandos de consola Artisan
 * 
 * Aquí se pueden definir comandos personalizados de Artisan
 */

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/**
 * Comando de inspiración
 */
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Mostrar una cita inspiradora');

/**
 * Comando para limpiar y optimizar el sistema
 */
Artisan::command('sistema:optimizar', function () {
    $this->info('Limpiando caché...');
    $this->call('cache:clear');
    $this->call('config:clear');
    $this->call('route:clear');
    $this->call('view:clear');
    
    $this->info('Optimizando...');
    $this->call('config:cache');
    $this->call('route:cache');
    $this->call('view:cache');
    
    $this->info('✓ Sistema optimizado exitosamente');
})->purpose('Limpiar y optimizar el sistema');
