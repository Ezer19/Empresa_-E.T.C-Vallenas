@extends('layouts.app')

@section('title', $proyecto->nombre . ' - ETC Vallenas')
@section('description', 'Proyecto ' . $proyecto->nombre . ' en ' . $proyecto->ubicacion . ' - ETC Vallenas')

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('proyectos.index') }}">Proyectos</a></li>
                <li class="breadcrumb-item active">{{ $proyecto->nombre }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Detalles del Proyecto -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Galería -->
            <div class="col-lg-7">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-0">
                        @if($proyecto->imagenes && count($proyecto->imagenes) > 0)
                        <img src="{{ asset('storage/proyectos/' . $proyecto->imagenes[0]) }}" 
                             class="img-fluid w-100 rounded-top" 
                             alt="{{ $proyecto->nombre }}"
                             style="height: 400px; object-fit: cover;">
                        
                        @if(count($proyecto->imagenes) > 1)
                        <div class="p-3">
                            <div class="row g-2">
                                @foreach($proyecto->imagenes as $imagen)
                                <div class="col-3">
                                    <img src="{{ asset('storage/proyectos/' . $imagen) }}" 
                                         class="img-fluid rounded" 
                                         alt="{{ $proyecto->nombre }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @else
                        <img src="{{ asset('assets/images/proyecto-placeholder.jpg') }}" 
                             class="img-fluid w-100 rounded" 
                             alt="{{ $proyecto->nombre }}">
                        @endif
                    </div>
                </div>
                
                <!-- Descripción -->
                @if($proyecto->descripcion)
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-info-circle me-2"></i>Descripción del Proyecto
                        </h5>
                        <p class="mb-0">{{ $proyecto->descripcion }}</p>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Información -->
            <div class="col-lg-5">
                <!-- Estado y Tipo -->
                <div class="mb-3">
                    <span class="badge bg-secondary me-2">
                        {{ ucfirst(str_replace('_', ' ', $proyecto->tipo)) }}
                    </span>
                    @if($proyecto->estado == 'completado')
                    <span class="badge bg-success">Completado</span>
                    @elseif($proyecto->estado == 'en_progreso')
                    <span class="badge bg-primary">En Progreso</span>
                    @else
                    <span class="badge bg-warning">Pausado</span>
                    @endif
                </div>
                
                <!-- Título -->
                <h1 class="display-5 fw-bold mb-4">{{ $proyecto->nombre }}</h1>
                
                <!-- Información General -->
                <div class="card border-0 bg-light mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-clipboard-list me-2"></i>Información General
                        </h6>
                        <div class="mb-3">
                            <i class="fas fa-user text-primary me-2"></i>
                            <strong>Cliente:</strong> {{ $proyecto->cliente }}
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <strong>Ubicación:</strong> {{ $proyecto->ubicacion }}
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-calendar text-primary me-2"></i>
                            <strong>Fecha de Inicio:</strong> 
                            {{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}
                        </div>
                        @if($proyecto->fecha_fin)
                        <div class="mb-0">
                            <i class="fas fa-calendar-check text-primary me-2"></i>
                            <strong>Fecha de Fin:</strong> 
                            {{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d/m/Y') }}
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Progreso -->
                @if($proyecto->avance_porcentaje)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-chart-line me-2"></i>Progreso del Proyecto
                        </h6>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Avance</span>
                            <span class="fw-bold text-primary">{{ $proyecto->avance_porcentaje }}%</span>
                        </div>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                 role="progressbar" 
                                 style="width: {{ $proyecto->avance_porcentaje }}%"
                                 aria-valuenow="{{ $proyecto->avance_porcentaje }}" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                                {{ $proyecto->avance_porcentaje }}%
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- Presupuesto -->
                @if($proyecto->presupuesto)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-dollar-sign me-2"></i>Presupuesto
                        </h6>
                        <h3 class="text-primary fw-bold mb-0">
                            S/ {{ number_format($proyecto->presupuesto, 2) }}
                        </h3>
                    </div>
                </div>
                @endif
                
                <!-- Maquinaria Utilizada -->
                @if($proyecto->maquinaria_ids && count($proyecto->maquinaria_ids) > 0)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-truck-monster me-2"></i>Maquinaria Utilizada
                        </h6>
                        <ul class="list-unstyled mb-0">
                            @foreach($maquinaria_usada as $maquina)
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <a href="{{ route('maquinaria.show', $maquina->_id) }}">
                                    {{ $maquina->nombre }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                
                <!-- Coordenadas del Proyecto (Mapa) -->
                @if($proyecto->coordenadas && isset($proyecto->coordenadas['lat']) && isset($proyecto->coordenadas['lng']))
                <div class="card border-0 shadow">
                    <div class="card-body p-0">
                        <div id="map" style="height: 300px; border-radius: 0.5rem;"></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Proyectos Relacionados -->
@if($relacionados && $relacionados->count() > 0)
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Proyectos Relacionados</h2>
        <div class="row g-4">
            @foreach($relacionados as $relacionado)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <img src="{{ $relacionado->imagenes && count($relacionado->imagenes) > 0 ? asset('storage/proyectos/' . $relacionado->imagenes[0]) : asset('assets/images/proyecto-placeholder.jpg') }}" 
                         class="card-img-top" 
                         alt="{{ $relacionado->nombre }}"
                         style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">
                            {{ ucfirst(str_replace('_', ' ', $relacionado->tipo)) }}
                        </span>
                        <h6 class="card-title fw-bold mb-2">{{ $relacionado->nombre }}</h6>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i>{{ $relacionado->ubicacion }}
                        </p>
                        <a href="{{ route('proyectos.show', $relacionado->_id) }}" class="btn btn-sm btn-outline-primary w-100">
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

<!-- Call to Action -->
<section class="section-padding bg-primary text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">¿Interesado en iniciar un proyecto similar?</h2>
        <p class="lead mb-4">Contáctanos y te ayudaremos a planificar y ejecutar tu proyecto</p>
        <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg">
            <i class="fas fa-envelope me-2"></i>Contáctanos Ahora
        </a>
    </div>
</section>
@endsection

@push('scripts')
@if($proyecto->coordenadas && isset($proyecto->coordenadas['lat']) && isset($proyecto->coordenadas['lng']))
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script>
    // Inicializar el mapa
    const map = L.map('map').setView([{{ $proyecto->coordenadas['lat'] }}, {{ $proyecto->coordenadas['lng'] }}], 15);
    
    // Añadir capa de mapa
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    
    // Añadir marcador
    L.marker([{{ $proyecto->coordenadas['lat'] }}, {{ $proyecto->coordenadas['lng'] }}])
        .addTo(map)
        .bindPopup('<b>{{ $proyecto->nombre }}</b><br>{{ $proyecto->ubicacion }}')
        .openPopup();
</script>
@endif
@endpush
