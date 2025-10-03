@extends('layouts.app')

@section('title', 'Mi Perfil - ETC Vallenas')

@section('content')
<!-- Header Section -->
<section class="py-4 bg-light">
    <div class="container">
        <h1 class="h3 fw-bold mb-0">Mi Perfil</h1>
        <p class="text-muted mb-0">Gestiona tu información personal</p>
    </div>
</section>

<!-- Perfil Content -->
<section class="section-padding">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        <div class="row g-4">
            <!-- Información del Perfil -->
            <div class="col-lg-4">
                <div class="card border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 120px; height: 120px; font-size: 3rem;">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <h4 class="fw-bold mb-1">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</h4>
                        <p class="text-muted mb-3">{{ Auth::user()->email }}</p>
                        <span class="badge bg-primary">{{ ucfirst(Auth::user()->rol) }}</span>
                        
                        <hr class="my-4">
                        
                        <div class="text-start">
                            <p class="mb-2">
                                <i class="fas fa-phone text-primary me-2"></i>
                                <strong>Teléfono:</strong><br>
                                <span class="text-muted">{{ Auth::user()->telefono }}</span>
                            </p>
                            @if(Auth::user()->empresa)
                            <p class="mb-2">
                                <i class="fas fa-building text-primary me-2"></i>
                                <strong>Empresa:</strong><br>
                                <span class="text-muted">{{ Auth::user()->empresa }}</span>
                            </p>
                            @endif
                            <p class="mb-0">
                                <i class="fas fa-calendar text-primary me-2"></i>
                                <strong>Miembro desde:</strong><br>
                                <span class="text-muted">
                                    {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d/m/Y') }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Formulario de Edición -->
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-edit me-2"></i>Editar Información Personal
                        </h5>
                        
                        <form action="{{ route('usuario.perfil.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nombre <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="nombre" 
                                           class="form-control @error('nombre') is-invalid @enderror" 
                                           value="{{ old('nombre', Auth::user()->nombre) }}"
                                           required>
                                    @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Apellido <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="apellido" 
                                           class="form-control @error('apellido') is-invalid @enderror" 
                                           value="{{ old('apellido', Auth::user()->apellido) }}"
                                           required>
                                    @error('apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           name="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email', Auth::user()->email) }}"
                                           required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Teléfono <span class="text-danger">*</span></label>
                                    <input type="tel" 
                                           name="telefono" 
                                           class="form-control @error('telefono') is-invalid @enderror" 
                                           value="{{ old('telefono', Auth::user()->telefono) }}"
                                           required>
                                    @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-12">
                                    <label class="form-label">Empresa</label>
                                    <input type="text" 
                                           name="empresa" 
                                           class="form-control" 
                                           value="{{ old('empresa', Auth::user()->empresa) }}">
                                </div>
                                
                                <div class="col-md-12">
                                    <hr>
                                    <h6 class="fw-bold mb-3">Cambiar Contraseña</h6>
                                    <p class="text-muted small">Deja estos campos en blanco si no deseas cambiar tu contraseña</p>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Nueva Contraseña</label>
                                    <input type="password" 
                                           name="password" 
                                           class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Confirmar Contraseña</label>
                                    <input type="password" 
                                           name="password_confirmation" 
                                           class="form-control">
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Guardar Cambios
                                        </button>
                                        <a href="{{ route('usuario.dashboard') }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-times me-2"></i>Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
