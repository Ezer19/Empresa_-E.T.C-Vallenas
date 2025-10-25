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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login');
        Route::get('/registro', 'showRegister')->name('registro');
        Route::post('/registro', 'register');
        Route::get('/recuperar-password', 'showForgotPassword')->name('recuperar');
        Route::post('/recuperar-password', 'sendResetLink');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::controller(EmpresaController::class)->prefix('empresa')->name('empresa.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/historia', 'historia')->name('historia');
    Route::get('/valores', 'valores')->name('valores');
    Route::get('/certificaciones', 'certificaciones')->name('certificaciones');
    Route::get('/sobre-nosotros', 'sobreNosotros')->name('sobre-nosotros');
});

Route::controller(ServicioController::class)->prefix('servicios')->name('servicios.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show')->whereNumber('id');
});

Route::controller(MaquinariaController::class)->prefix('maquinaria')->name('maquinaria.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show')->whereNumber('id');
});

Route::controller(ProyectoController::class)->prefix('proyectos')->name('proyectos.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show')->whereNumber('id');
});

Route::controller(BlogController::class)->prefix('blog')->name('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('show')->where('slug', '[a-z0-9\-]+');
});

Route::prefix('contacto')->name('contacto.')->group(function () {
    Route::get('/', function () {
        return view('contacto.index');
    })->name('index');
    
    Route::get('/soporte', function () {
        return view('contacto.soporte');
    })->name('soporte');
    
    Route::get('/ubicacion', function () {
        return view('contacto.ubicacion');
    })->name('ubicacion');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UsuarioController::class, 'dashboard'])->name('usuario.dashboard');
    
    Route::controller(UsuarioController::class)->group(function () {
        Route::prefix('perfil')->name('usuario.')->group(function () {
            Route::get('/', 'perfil')->name('perfil');
            Route::put('/', 'actualizarPerfil')->name('actualizar-perfil');
            Route::post('/cambiar-password', 'cambiarPassword')->name('cambiar-password');
        });
        
        Route::prefix('configuracion')->name('usuario.')->group(function () {
            Route::get('/', 'configuracion')->name('configuracion');
            Route::put('/', 'actualizarConfiguracion')->name('actualizar-configuracion');
        });
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    Route::prefix('usuarios')->name('usuarios.')->controller(UsuarioController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/{id}', 'update')->name('update')->whereNumber('id');
        Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
    });
    
    Route::prefix('maquinaria')->name('maquinaria.')->group(function () {
        Route::get('/', [AdminController::class, 'gestionMaquinaria'])->name('index');
        Route::controller(MaquinariaController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update')->whereNumber('id');
            Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
        });
    });
    
    Route::prefix('proyectos')->name('proyectos.')->group(function () {
        Route::get('/', [AdminController::class, 'gestionProyectos'])->name('index');
        Route::controller(ProyectoController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update')->whereNumber('id');
            Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
            Route::patch('/{id}/avance', 'actualizarAvance')->name('avance')->whereNumber('id');
        });
    });
    
    Route::prefix('servicios')->name('servicios.')->group(function () {
        Route::get('/', [AdminController::class, 'gestionServicios'])->name('index');
        Route::controller(ServicioController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update')->whereNumber('id');
            Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
        });
    });
    
    Route::get('/reportes', [AdminController::class, 'reportes'])->name('reportes');
});