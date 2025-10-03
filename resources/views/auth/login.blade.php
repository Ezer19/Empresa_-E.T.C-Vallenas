@extends('layouts.app')

@section('title', 'Iniciar Sesión - ETC Vallenas')

@section('content')
<div class="min-vh-100 d-flex align-items-center" style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="ETC Vallenas" height="60">
                            <h3 class="mt-3 fw-bold">Iniciar Sesión</h3>
                            <p class="text-muted">Accede a tu cuenta de ETC Vallenas</p>
                        </div>

                        <!-- Errores -->
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        <!-- Formulario de Login -->
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i>Correo Electrónico
                                </label>
                                <input type="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       placeholder="tu@email.com"
                                       required 
                                       autofocus>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Contraseña
                                </label>
                                <input type="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password"
                                       placeholder="••••••••"
                                       required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Recordarme -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Recordarme en este dispositivo
                                </label>
                            </div>

                            <!-- Botón de Login -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="fas fa-sign-in-alt me-2"></i>Ingresar
                            </button>

                            <!-- Enlaces -->
                            <div class="text-center">
                                <a href="{{ route('recuperar') }}" class="text-decoration-none">
                                    <i class="fas fa-question-circle me-1"></i>¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </form>

                        <hr class="my-4">

                        <!-- Registro -->
                        <div class="text-center">
                            <p class="text-muted mb-0">
                                ¿No tienes cuenta? 
                                <a href="{{ route('registro') }}" class="fw-bold text-decoration-none">
                                    Regístrate aquí
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Volver al inicio -->
                <div class="text-center mt-3">
                    <a href="{{ route('home') }}" class="text-white text-decoration-none">
                        <i class="fas fa-arrow-left me-2"></i>Volver al inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
