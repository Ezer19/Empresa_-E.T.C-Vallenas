@extends('layouts.app')

@section('title', 'Registrarse - ETC Vallenas')

@section('content')
<div class="min-vh-100 d-flex align-items-center py-5" style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="ETC Vallenas" height="60">
                            <h3 class="mt-3 fw-bold">Crear Cuenta</h3>
                            <p class="text-muted">Únete a ETC Vallenas hoy mismo</p>
                        </div>

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

                        <form action="{{ route('registro.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre" class="form-label">
                                        <i class="fas fa-user me-1"></i>Nombre *
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('nombre') is-invalid @enderror" 
                                           id="nombre" 
                                           name="nombre" 
                                           value="{{ old('nombre') }}"
                                           placeholder="Juan"
                                           required>
                                    @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="apellido" class="form-label">
                                        <i class="fas fa-user me-1"></i>Apellido *
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('apellido') is-invalid @enderror" 
                                           id="apellido" 
                                           name="apellido" 
                                           value="{{ old('apellido') }}"
                                           placeholder="Pérez"
                                           required>
                                    @error('apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i>Correo Electrónico *
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}"
                                       placeholder="tu@email.com"
                                       required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">
                                    <i class="fas fa-phone me-1"></i>Teléfono *
                                </label>
                                <input type="tel" 
                                       class="form-control @error('telefono') is-invalid @enderror" 
                                       id="telefono" 
                                       name="telefono" 
                                       value="{{ old('telefono') }}"
                                       placeholder="+51 987 654 321"
                                       required>
                                @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="empresa" class="form-label">
                                    <i class="fas fa-building me-1"></i>Empresa (Opcional)
                                </label>
                                <input type="text" 
                                       class="form-control @error('empresa') is-invalid @enderror" 
                                       id="empresa" 
                                       name="empresa" 
                                       value="{{ old('empresa') }}"
                                       placeholder="Constructora ABC SAC">
                                @error('empresa')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">
                                        <i class="fas fa-lock me-1"></i>Contraseña *
                                    </label>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password"
                                           placeholder="Mínimo 6 caracteres"
                                           required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">
                                        <i class="fas fa-lock me-1"></i>Confirmar Contraseña *
                                    </label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation"
                                           placeholder="Repite tu contraseña"
                                           required>
                                </div>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input @error('terminos') is-invalid @enderror" 
                                       type="checkbox" 
                                       id="terminos" 
                                       name="terminos"
                                       {{ old('terminos') ? 'checked' : '' }}
                                       required>
                                <label class="form-check-label" for="terminos">
                                    Acepto los <a href="{{ route('terminos') }}" class="text-decoration-none">términos y condiciones</a> 
                                    y la <a href="{{ route('privacidad') }}" class="text-decoration-none">política de privacidad</a>
                                </label>
                                @error('terminos')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="fas fa-user-plus me-2"></i>Crear Cuenta
                            </button>
                        </form>

                        <hr class="my-4">

                        <div class="text-center">
                            <p class="text-muted mb-0">
                                ¿Ya tienes cuenta? 
                                <a href="{{ route('login') }}" class="fw-bold text-decoration-none">
                                    Inicia sesión aquí
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password_confirmation');
    
    function validatePassword() {
        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Las contraseñas no coinciden');
        } else {
            confirmPassword.setCustomValidity('');
        }
    }
    
    password.addEventListener('input', validatePassword);
    confirmPassword.addEventListener('input', validatePassword);
    
    const telefono = document.getElementById('telefono');
    telefono.addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/[^0-9+\s-]/g, '');
    });
});
</script>
@endpush