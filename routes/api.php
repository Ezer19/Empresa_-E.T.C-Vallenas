<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServicioController;
use App\Http\Controllers\Api\MaquinariaController;
use App\Http\Controllers\Api\ProyectoController;
use App\Http\Controllers\Api\BlogController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/registro', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('/recuperar-password', [AuthController::class, 'forgotPassword']);
});

Route::apiResource('servicios', ServicioController::class)->only(['index', 'show']);
Route::apiResource('maquinaria', MaquinariaController::class)->only(['index', 'show']);
Route::apiResource('proyectos', ProyectoController::class)->only(['index', 'show']);
Route::apiResource('blog', BlogController::class)->only(['index', 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('servicios', ServicioController::class)->except(['index', 'show']);
    Route::apiResource('maquinaria', MaquinariaController::class)->except(['index', 'show']);
    Route::apiResource('proyectos', ProyectoController::class)->except(['index', 'show']);
    Route::apiResource('blog', BlogController::class)->except(['index', 'show']);
    
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::get('/estadisticas', [App\Http\Controllers\Api\AdminController::class, 'estadisticas']);
        Route::get('/reportes', [App\Http\Controllers\Api\AdminController::class, 'reportes']);
    });
});