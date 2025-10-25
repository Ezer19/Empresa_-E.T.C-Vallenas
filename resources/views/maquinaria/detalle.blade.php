@extends('layouts.app')

@section('title', $maquinaria->nombre . ' - ETC Vallenas')
@section('description', 'Alquila ' . $maquinaria->nombre . ' - ' . $maquinaria->marca . ' ' . $maquinaria->modelo . ' en ETC Vallenas.')

@section('content')
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('maquinaria.index') }}">Maquinaria</a></li>
                <li class="breadcrumb-item active">{{ $maquinaria->nombre }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-0">
                        @if($maquinaria->imagenes && count($maquinaria->imagenes) > 0)
                        <img src="{{ Storage::url('maquinaria/' . $maquinaria->imagenes[0]) }}" 
                             class="img-fluid w-100 rounded-top" 
                             alt="{{ $maquinaria->nombre }}"
                             style="height: 400px; object-fit: cover;">
                        
                        @if(count($maquinaria->imagenes) > 1)
                        <div class="p-3">
                            <div class="row g-2">
                                @foreach(array_slice($maquinaria->imagenes, 0, 4) as $imagen)
                                <div class="col-3">
                                    <img src="{{ Storage::url('maquinaria/' . $imagen) }}" 
                                         class="img-fluid rounded" 
                                         alt="{{ $maquinaria->nombre }}"
                                         style="height: 80px; object-fit: cover;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @else
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-top" 
                             style="height: 400px;">
                            <i class="fas fa-truck-monster fa-6x opacity-25"></i>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge bg-primary">{{ ucfirst($maquinaria->tipo) }}</span>
                    @if($maquinaria->disponibilidad == 'disponible')
                    <span class="badge bg-success">Disponible</span>
                    @elseif($maquinaria->disponibilidad == 'en_uso')
                    <span class="badge bg-warning">En uso</span>
                    @else
                    <span class="badge bg-danger">Mantenimiento</span>
                    @endif
                </div>
                
                <h1 class="h2 fw-bold mb-3">{{ $maquinaria->nombre }}</h1>
                
                <p class="lead text-muted mb-4">
                    {{ $maquinaria->marca }} - {{ $maquinaria->modelo }} ({{ $maquinaria->año }})
                </p>
                
                @if($maquinaria->descripcion)
                <div class="mb-4">
                    <div class="text-content">
                        {!! nl2br(e($maquinaria->descripcion)) !!}
                    </div>
                </div>
                @endif
                
                <div class="card border-0 bg-light mb-4">
                    <div class="card-body p-4">
                        <h4 class="h5 fw-bold mb-3">
                            <i class="fas fa-cogs text-primary me-2"></i>Especificaciones Técnicas
                        </h4>
                        <div class="row g-3">
                            @if($maquinaria->potencia)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-bolt text-primary me-3"></i>
                                    <div>
                                        <strong>Potencia:</strong>
                                        <p class="mb-0 text-muted">{{ $maquinaria->potencia }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($maquinaria->capacidad)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-weight text-primary me-3"></i>
                                    <div>
                                        <strong>Capacidad:</strong>
                                        <p class="mb-0 text-muted">{{ $maquinaria->capacidad }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($maquinaria->peso)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-balance-scale text-primary me-3"></i>
                                    <div>
                                        <strong>Peso:</strong>
                                        <p class="mb-0 text-muted">{{ $maquinaria->peso }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($maquinaria->dimensiones)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-ruler-combined text-primary me-3"></i>
                                    <div>
                                        <strong>Dimensiones:</strong>
                                        <p class="mb-0 text-muted">{{ $maquinaria->dimensiones }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h4 class="h5 fw-bold mb-3">
                            <i class="fas fa-money-bill-wave text-primary me-2"></i>Tarifas de Alquiler
                        </h4>
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
                
                @if($maquinaria->caracteristicas && count($maquinaria->caracteristicas) > 0)
                <div class="mb-4">
                    <h4 class="h5 fw-bold mb-3">
                        <i class="fas fa-check-circle text-primary me-2"></i>Características
                    </h4>
                    <ul class="list-unstyled">
                        @foreach($maquinaria->caracteristicas as $caracteristica)
                        <li class="mb-2">
                            <i class="fas fa-check text-success me-2"></i>
                            <span class="text-muted">{{ $caracteristica }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="d-grid gap-3">
                    <a href="{{ route('contacto.index', ['maquinaria' => $maquinaria->id]) }}" class="btn btn-primary btn-lg py-3 fw-semibold">
                        <i class="fas fa-paper-plane me-2"></i>Solicitar Cotización
                    </a>
                    <a href="https://wa.me/51984123456?text=Hola, me interesa: {{ urlencode($maquinaria->nombre) }}" 
                       target="_blank" 
                       class="btn btn-success btn-lg py-3 fw-semibold">
                        <i class="fab fa-whatsapp me-2"></i>Consultar por WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@if($relacionadas && $relacionadas->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Maquinaria Relacionada</h2>
            <p class="text-muted lead">Descubre equipos similares que podrían interesarte</p>
        </div>
        <div class="row g-4">
            @foreach($relacionadas as $relacionada)
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    @if($relacionada->imagenes && count($relacionada->imagenes) > 0)
                    <img src="{{ Storage::url('maquinaria/' . $relacionada->imagenes[0]) }}" 
                         class="card-img-top" 
                         alt="{{ $relacionada->nombre }}"
                         style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                         style="height: 200px;">
                        <i class="fas fa-truck-monster fa-3x opacity-25"></i>
                    </div>
                    @endif
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-2">{{ $relacionada->nombre }}</h5>
                        <p class="text-muted small mb-3">{{ $relacionada->marca }} - {{ $relacionada->modelo }}</p>
                        <a href="{{ route('maquinaria.show', $relacionada->id) }}" class="btn btn-outline-primary w-100">
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