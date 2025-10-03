<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\MaquinariaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes - ETC Vallenas
|--------------------------------------------------------------------------
| Rutas para la aplicación de alquiler de maquinaria pesada
*/

/**
 * Página principal
 */
Route::get('/', function () {
    return view('welcome');
})->name('home');

/**
 * Rutas de Autenticación
 */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/registro', [AuthController::class, 'showRegister'])->name('registro');
    Route::post('/registro', [AuthController::class, 'register']);
    Route::get('/recuperar-password', [AuthController::class, 'showForgotPassword'])->name('recuperar');
    Route::post('/recuperar-password', [AuthController::class, 'sendResetLink']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/**
 * Rutas de la Empresa
 */
Route::prefix('empresa')->name('empresa.')->group(function () {
    Route::get('/', [EmpresaController::class, 'index'])->name('index');
    Route::get('/historia', [EmpresaController::class, 'historia'])->name('historia');
    Route::get('/valores', [EmpresaController::class, 'valores'])->name('valores');
    Route::get('/certificaciones', [EmpresaController::class, 'certificaciones'])->name('certificaciones');
    Route::get('/sobre-nosotros', [EmpresaController::class, 'sobreNosotros'])->name('sobre-nosotros');
});

/**
 * Rutas de Servicios
 */
Route::prefix('servicios')->name('servicios.')->group(function () {
    Route::get('/', [ServicioController::class, 'index'])->name('index');
    Route::get('/{id}', [ServicioController::class, 'show'])->name('show');
});

/**
 * Rutas de Maquinaria
 */
Route::prefix('maquinaria')->name('maquinaria.')->group(function () {
    Route::get('/', [MaquinariaController::class, 'index'])->name('index');
    Route::get('/{id}', [MaquinariaController::class, 'show'])->name('show');
});

/**
 * Rutas de Proyectos
 */
Route::prefix('proyectos')->name('proyectos.')->group(function () {
    Route::get('/', [ProyectoController::class, 'index'])->name('index');
    Route::get('/{id}', [ProyectoController::class, 'show'])->name('show');
});

/**
 * Rutas del Blog
 */
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

/**
 * Rutas de Contacto
 */
Route::get('/contacto', function () {
    return view('contacto.index');
})->name('contacto.index');

Route::get('/contacto/soporte', function () {
    return view('contacto.soporte');
})->name('contacto.soporte');

Route::get('/contacto/ubicacion', function () {
    return view('contacto.ubicacion');
})->name('contacto.ubicacion');

/**
 * Rutas de Usuario Autenticado
 */
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UsuarioController::class, 'dashboard'])->name('usuario.dashboard');
    Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('usuario.perfil');
    Route::post('/perfil', [UsuarioController::class, 'actualizarPerfil'])->name('usuario.actualizar-perfil');
    Route::post('/cambiar-password', [UsuarioController::class, 'cambiarPassword'])->name('usuario.cambiar-password');
    Route::get('/configuracion', [UsuarioController::class, 'configuracion'])->name('usuario.configuracion');
    Route::post('/configuracion', [UsuarioController::class, 'actualizarConfiguracion'])->name('usuario.actualizar-configuracion');
});

/**
 * Rutas de Administración
 */
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    // Gestión de Usuarios
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');
    Route::post('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    
    // Gestión de Maquinaria
    Route::get('/maquinaria', [AdminController::class, 'gestionMaquinaria'])->name('maquinaria');
    Route::post('/maquinaria', [MaquinariaController::class, 'store'])->name('maquinaria.store');
    Route::post('/maquinaria/{id}', [MaquinariaController::class, 'update'])->name('maquinaria.update');
    Route::delete('/maquinaria/{id}', [MaquinariaController::class, 'destroy'])->name('maquinaria.destroy');
    
    // Gestión de Proyectos
    Route::get('/proyectos', [AdminController::class, 'gestionProyectos'])->name('proyectos');
    Route::post('/proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');
    Route::post('/proyectos/{id}', [ProyectoController::class, 'update'])->name('proyectos.update');
    Route::delete('/proyectos/{id}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');
    Route::post('/proyectos/{id}/avance', [ProyectoController::class, 'actualizarAvance'])->name('proyectos.avance');
    
    // Gestión de Servicios
    Route::get('/servicios', [AdminController::class, 'gestionServicios'])->name('servicios');
    Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');
    Route::post('/servicios/{id}', [ServicioController::class, 'update'])->name('servicios.update');
    Route::delete('/servicios/{id}', [ServicioController::class, 'destroy'])->name('servicios.destroy');
    
    // Reportes
    Route::get('/reportes', [AdminController::class, 'reportes'])->name('reportes');
});
