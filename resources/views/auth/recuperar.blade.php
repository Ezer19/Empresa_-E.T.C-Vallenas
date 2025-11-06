@extends('layouts.app')

@section('title', 'Recuperar Contraseña - ETC Vallenas')

@section('content')
    <div class="min-vh-100 d-flex align-items-center" style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="ETC Vallenas" height="60">
                                <h3 class="mt-3 fw-bold">Recuperar Contraseña</h3>
                                <p class="text-muted">Te enviaremos un enlace para restablecer tu contraseña</p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="email" class="form-label">
                                        <i class="fas fa-envelope me-1"></i>Correo Electrónico
                                    </label>
                                    <input type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" placeholder="tu@email.com"
                                        required autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        Ingresa el correo con el que te registraste
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                    <i class="fas fa-paper-plane me-2"></i>Enviar Enlace de Recuperación
                                </button>
                            </form>

                            <hr class="my-4">

                            <div class="text-center">
                                <p class="text-muted mb-2">
                                    ¿Recordaste tu contraseña?
                                    <a href="{{ route('login') }}" class="fw-bold text-decoration-none">
                                        Inicia sesión
                                    </a>
                                </p>
                                <p class="text-muted mb-0">
                                    ¿No tienes cuenta?
                                    <a href="{{ route('registro') }}" class="fw-bold text-decoration-none">
                                        Regístrate aquí
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

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
