@extends('layouts.app')

@section('title', 'Nuestros Servicios - ETC Vallenas')
@section('description', 'Conoce todos los servicios que ETC Vallenas ofrece para tu proyecto: alquiler de maquinaria, transporte, y más.')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3 text-white">Nuestros Servicios</h1>
                <p class="lead text-white mb-0">
                    Soluciones completas para todo tipo de proyectos de construcción y movimiento de tierras
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="bg-white p-3 rounded shadow d-inline-block">
                    <i class="fas fa-tools text-primary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filtros -->
<section class="py-4 bg-light">
    <div class="container">
        <form action="{{ route('servicios.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-lg-5 col-md-6">
                    <input type="text" 
                           name="buscar" 
                           class="form-control" 
                           placeholder="Buscar servicios..."
                           value="{{ request('buscar') }}">
                </div>
                <div class="col-lg-4 col-md-6">
                    <select name="tipo" class="form-select">
                        <option value="">Todos los tipos</option>
                        @foreach($tipos as $tipo)
                        <option value="{{ $tipo }}" {{ request('tipo') == $tipo ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $tipo)) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-6">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-2"></i>Buscar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Listado de Servicios -->
<section class="section-padding">
    <div class="container">
        @if($servicios->count() > 0)
        <div class="row g-4">
            @foreach($servicios as $servicio)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-shadow {{ $servicio->destacado ? 'border border-primary border-3' : '' }}">
                    @if($servicio->destacado)
                    <div class="position-absolute top-0 start-50 translate-middle">
                        <span class="badge bg-primary">Destacado</span>
                    </div>
                    @endif
                    
                    <!-- Imagen -->
                    @if($servicio->imagen)
                    <img src="{{ asset('storage/servicios/' . $servicio->imagen) }}" 
                         class="card-img-top" 
                         alt="{{ $servicio->nombre }}"
                         style="height: 250px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                         style="height: 250px;">
                        <i class="fas fa-tools" style="font-size: 5rem; opacity: 0.3;"></i>
                    </div>
                    @endif
                    
                    <div class="card-body">
                        <!-- Tipo -->
                        <span class="badge bg-secondary mb-2">
                            {{ ucfirst(str_replace('_', ' ', $servicio->tipo)) }}
                        </span>
                        
                        <!-- Nombre -->
                        <h5 class="card-title fw-bold mb-3">{{ $servicio->nombre }}</h5>
                        
                        <!-- Descripción corta -->
                        @if($servicio->descripcion_corta)
                        <p class="text-muted mb-3">
                            {{ Str::limit($servicio->descripcion_corta, 100) }}
                        </p>
                        @endif
                        
                        <!-- Características -->
                        @if($servicio->caracteristicas && count($servicio->caracteristicas) > 0)
                        <ul class="list-unstyled mb-3">
                            @foreach(array_slice($servicio->caracteristicas, 0, 3) as $caracteristica)
                            <li class="mb-1">
                                <i class="fas fa-check text-success me-2"></i>
                                <small>{{ $caracteristica }}</small>
                            </li>
                            @endforeach
                            @if(count($servicio->caracteristicas) > 3)
                            <li class="text-muted">
                                <small>+ {{ count($servicio->caracteristicas) - 3 }} más</small>
                            </li>
                            @endif
                        </ul>
                        @endif
                        
                        <!-- Precio -->
                        @if($servicio->precio_base)
                        <div class="mb-3">
                            <p class="mb-0 fw-bold text-primary">
                                Desde S/ {{ number_format($servicio->precio_base, 2) }}
                            </p>
                        </div>
                        @endif
                        
                        <!-- Botón -->
                        <a href="{{ route('servicios.show', $servicio->_id) }}" 
                           class="btn {{ $servicio->destacado ? 'btn-primary' : 'btn-outline-primary' }} w-100">
                            <i class="fas fa-info-circle me-2"></i>Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Paginación -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $servicios->links() }}
        </div>
        
        @else
        <!-- Sin resultados -->
        <div class="text-center py-5">
            <i class="fas fa-search text-muted" style="font-size: 4rem;"></i>
            <h3 class="mt-3">No se encontraron servicios</h3>
            <p class="text-muted">Intenta con otros criterios de búsqueda</p>
            <a href="{{ route('servicios.index') }}" class="btn btn-primary">
                <i class="fas fa-redo me-2"></i>Ver Todos
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Por qué elegirnos -->
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">¿Por qué elegir nuestros servicios?</h2>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow text-center h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-certificate text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Certificados</h5>
                        <p class="text-muted mb-0">Personal calificado y equipos certificados</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow text-center h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-clock text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Disponibilidad 24/7</h5>
                        <p class="text-muted mb-0">Atención y soporte en todo momento</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow text-center h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-shield-alt text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Seguridad</h5>
                        <p class="text-muted mb-0">Cumplimiento de normas de seguridad</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow text-center h-100">
                    <div class="card-body">
                        <div class="icon-box mb-3">
                            <i class="fas fa-headset text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Soporte</h5>
                        <p class="text-muted mb-0">Asesoría técnica personalizada</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">¿Necesitas un servicio personalizado?</h2>
                <p class="mb-0">
                    Contáctanos y te ayudaremos a diseñar la solución perfecta para tu proyecto
                </p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-envelope me-2"></i>Contáctanos
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
