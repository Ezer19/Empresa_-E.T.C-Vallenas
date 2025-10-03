@extends('layouts.app')

@section('title', $maquinaria->nombre . ' - ETC Vallenas')
@section('description', 'Alquila ' . $maquinaria->nombre . ' - ' . $maquinaria->marca . ' ' . $maquinaria->modelo . ' en ETC Vallenas.')

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('maquinaria.index') }}">Maquinaria</a></li>
                <li class="breadcrumb-item active">{{ $maquinaria->nombre }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Detalles de Maquinaria -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Galería de Imágenes -->
            <div class="col-lg-6">
                <div class="card border-0 shadow">
                    <div class="card-body p-0">
                        @if($maquinaria->imagenes && count($maquinaria->imagenes) > 0)
                        <!-- Imagen principal -->
                        <img src="{{ asset('storage/maquinaria/' . $maquinaria->imagenes[0]) }}" 
                             class="img-fluid w-100 rounded-top" 
                             alt="{{ $maquinaria->nombre }}"
                             style="height: 400px; object-fit: cover;">
                        
                        <!-- Miniaturas -->
                        @if(count($maquinaria->imagenes) > 1)
                        <div class="p-3">
                            <div class="row g-2">
                                @foreach($maquinaria->imagenes as $imagen)
                                <div class="col-3">
                                    <img src="{{ asset('storage/maquinaria/' . $imagen) }}" 
                                         class="img-fluid rounded cursor-pointer" 
                                         alt="{{ $maquinaria->nombre }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @else
                        <img src="{{ asset('assets/images/maquinaria-placeholder.jpg') }}" 
                             class="img-fluid w-100 rounded" 
                             alt="{{ $maquinaria->nombre }}">
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Información -->
            <div class="col-lg-6">
                <!-- Categoría y Estado -->
                <div class="mb-3">
                    <span class="badge bg-primary me-2">{{ ucfirst($maquinaria->tipo) }}</span>
                    @if($maquinaria->disponibilidad == 'disponible')
                    <span class="badge bg-success">Disponible</span>
                    @elseif($maquinaria->disponibilidad == 'en_uso')
                    <span class="badge bg-warning">En uso</span>
                    @else
                    <span class="badge bg-danger">Mantenimiento</span>
                    @endif
                </div>
                
                <!-- Título -->
                <h1 class="display-5 fw-bold mb-3">{{ $maquinaria->nombre }}</h1>
                
                <!-- Marca y Modelo -->
                <p class="lead text-muted mb-4">
                    {{ $maquinaria->marca }} - {{ $maquinaria->modelo }} ({{ $maquinaria->año }})
                </p>
                
                <!-- Descripción -->
                @if($maquinaria->descripcion)
                <p class="mb-4">{{ $maquinaria->descripcion }}</p>
                @endif
                
                <!-- Especificaciones Técnicas -->
                <div class="card border-0 bg-light mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-cogs me-2"></i>Especificaciones Técnicas
                        </h5>
                        <div class="row g-3">
                            @if($maquinaria->potencia)
                            <div class="col-md-6">
                                <i class="fas fa-bolt text-primary me-2"></i>
                                <strong>Potencia:</strong> {{ $maquinaria->potencia }}
                            </div>
                            @endif
                            @if($maquinaria->capacidad)
                            <div class="col-md-6">
                                <i class="fas fa-weight text-primary me-2"></i>
                                <strong>Capacidad:</strong> {{ $maquinaria->capacidad }}
                            </div>
                            @endif
                            @if($maquinaria->peso)
                            <div class="col-md-6">
                                <i class="fas fa-balance-scale text-primary me-2"></i>
                                <strong>Peso:</strong> {{ $maquinaria->peso }}
                            </div>
                            @endif
                            @if($maquinaria->dimensiones)
                            <div class="col-md-6">
                                <i class="fas fa-ruler-combined text-primary me-2"></i>
                                <strong>Dimensiones:</strong> {{ $maquinaria->dimensiones }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Tarifas -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-money-bill-wave me-2"></i>Tarifas de Alquiler
                        </h5>
                        <div class="row g-3">
                            @if($maquinaria->tarifa_hora)
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h6 class="text-muted mb-1">Por Hora</h6>
                                    <h4 class="fw-bold text-primary mb-0">
                                        S/ {{ number_format($maquinaria->tarifa_hora, 2) }}
                                    </h4>
                                </div>
                            </div>
                            @endif
                            @if($maquinaria->tarifa_dia)
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h6 class="text-muted mb-1">Por Día</h6>
                                    <h4 class="fw-bold text-primary mb-0">
                                        S/ {{ number_format($maquinaria->tarifa_dia, 2) }}
                                    </h4>
                                </div>
                            </div>
                            @endif
                            @if($maquinaria->tarifa_semana)
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h6 class="text-muted mb-1">Por Semana</h6>
                                    <h4 class="fw-bold text-primary mb-0">
                                        S/ {{ number_format($maquinaria->tarifa_semana, 2) }}
                                    </h4>
                                </div>
                            </div>
                            @endif
                            @if($maquinaria->tarifa_mes)
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded text-center">
                                    <h6 class="text-muted mb-1">Por Mes</h6>
                                    <h4 class="fw-bold text-primary mb-0">
                                        S/ {{ number_format($maquinaria->tarifa_mes, 2) }}
                                    </h4>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Características -->
                @if($maquinaria->caracteristicas && count($maquinaria->caracteristicas) > 0)
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-check-circle me-2"></i>Características
                    </h5>
                    <ul class="list-unstyled">
                        @foreach($maquinaria->caracteristicas as $caracteristica)
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>{{ $caracteristica }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <!-- Botones de Acción -->
                <div class="d-grid gap-2 d-md-flex">
                    <a href="{{ route('contacto.index') }}" class="btn btn-primary btn-lg flex-fill">
                        <i class="fas fa-paper-plane me-2"></i>Solicitar Cotización
                    </a>
                    <a href="https://wa.me/51984123456?text=Hola, me interesa {{ $maquinaria->nombre }}" 
                       target="_blank" 
                       class="btn btn-success btn-lg">
                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Maquinaria Relacionada -->
@if($relacionadas && $relacionadas->count() > 0)
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Maquinaria Relacionada</h2>
        <div class="row g-4">
            @foreach($relacionadas as $relacionada)
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <img src="{{ $relacionada->imagenes && count($relacionada->imagenes) > 0 ? asset('storage/maquinaria/' . $relacionada->imagenes[0]) : asset('assets/images/maquinaria-placeholder.jpg') }}" 
                         class="card-img-top" 
                         alt="{{ $relacionada->nombre }}"
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-2">{{ $relacionada->nombre }}</h6>
                        <p class="text-muted small mb-3">{{ $relacionada->marca }} - {{ $relacionada->modelo }}</p>
                        <a href="{{ route('maquinaria.show', $relacionada->_id) }}" class="btn btn-sm btn-outline-primary w-100">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
