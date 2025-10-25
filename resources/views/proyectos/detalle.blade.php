@extends('layouts.app')

@section('title', $proyecto->nombre . ' - ETC Vallenas')
@section('description', 'Proyecto ' . $proyecto->nombre . ' en ' . $proyecto->ubicacion . ' - ETC Vallenas')

@section('content')
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('proyectos.index') }}">Proyectos</a></li>
                <li class="breadcrumb-item active">{{ $proyecto->nombre }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-0">
                        @if($proyecto->imagenes && count($proyecto->imagenes) > 0)
                        <img src="{{ Storage::url('proyectos/' . $proyecto->imagenes[0]) }}" 
                             class="img-fluid w-100 rounded-top" 
                             alt="{{ $proyecto->nombre }}"
                             style="height: 400px; object-fit: cover;">
                        
                        @if(count($proyecto->imagenes) > 1)
                        <div class="p-3">
                            <div class="row g-2">
                                @foreach(array_slice($proyecto->imagenes, 0, 4) as $imagen)
                                <div class="col-3">
                                    <img src="{{ Storage::url('proyectos/' . $imagen) }}" 
                                         class="img-fluid rounded" 
                                         alt="{{ $proyecto->nombre }}"
                                         style="height: 80px; object-fit: cover;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @else
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-top" 
                             style="height: 400px;">
                            <i class="fas fa-building fa-6x opacity-25"></i>
                        </div>
                        @endif
                    </div>
                </div>
                
                @if($proyecto->descripcion)
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h3 class="h4 fw-bold mb-3">
                            <i class="fas fa-info-circle text-primary me-2"></i>Descripción del Proyecto
                        </h3>
                        <div class="text-content">
                            {!! nl2br(e($proyecto->descripcion)) !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
            <div class="col-lg-5">
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge bg-secondary">
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
                
                <h1 class="h2 fw-bold mb-4">{{ $proyecto->nombre }}</h1>
                
                <div class="card border-0 bg-light mb-4">
                    <div class="card-body p-4">
                        <h4 class="h5 fw-bold mb-3">
                            <i class="fas fa-clipboard-list text-primary me-2"></i>Información General
                        </h4>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-user text-primary me-3"></i>
                            <div>
                                <strong>Cliente:</strong>
                                <p class="mb-0 text-muted">{{ $proyecto->cliente }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-map-marker-alt text-primary me-3"></i>
                            <div>
                                <strong>Ubicación:</strong>
                                <p class="mb-0 text-muted">{{ $proyecto->ubicacion }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-calendar text-primary me-3"></i>
                            <div>
                                <strong>Fecha de Inicio:</strong>
                                <p class="mb-0 text-muted">{{ $proyecto->fecha_inicio->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        @if($proyecto->fecha_fin)
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar-check text-primary me-3"></i>
                            <div>
                                <strong>Fecha de Fin:</strong>
                                <p class="mb-0 text-muted">{{ $proyecto->fecha_fin->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                @if($proyecto->avance_porcentaje)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h4 class="h5 fw-bold mb-3">
                            <i class="fas fa-chart-line text-primary me-2"></i>Progreso del Proyecto
                        </h4>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Avance</span>
                            <span class="fw-bold text-primary">{{ $proyecto->avance_porcentaje }}%</span>
                        </div>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
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
                
                @if($proyecto->presupuesto)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4 text-center">
                        <h4 class="h5 fw-bold mb-3">
                            <i class="fas fa-dollar-sign text-primary me-2"></i>Presupuesto
                        </h4>
                        <h3 class="text-primary fw-bold mb-0">
                            S/ {{ number_format($proyecto->presupuesto, 2) }}
                        </h3>
                    </div>
                </div>
                @endif
                
                @if($maquinaria_usada && $maquinaria_usada->count() > 0)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h4 class="h5 fw-bold mb-3">
                            <i class="fas fa-truck-monster text-primary me-2"></i>Maquinaria Utilizada
                        </h4>
                        <ul class="list-unstyled mb-0">
                            @foreach($maquinaria_usada as $maquina)
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <a href="{{ route('maquinaria.show', $maquina->id) }}" class="text-decoration-none">
                                    {{ $maquina->nombre }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                
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

@if($relacionados && $relacionados->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Proyectos Relacionados</h2>
            <p class="text-muted lead">Descubre otros proyectos similares</p>
        </div>
        <div class="row g-4">
            @foreach($relacionados as $relacionado)
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    @if($relacionado->imagenes && count($relacionado->imagenes) > 0)
                    <img src="{{ Storage::url('proyectos/' . $relacionado->imagenes[0]) }}" 
                        class="card-img-top" 
                        alt="{{ $relacionado->nombre }}"
                        style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                        style="height: 200px;">
                        <i class="fas fa-building fa-3x opacity-25"></i>
                    </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            <span class="badge bg-secondary">
                                {{ ucfirst(str_replace('_', ' ', $relacionado->tipo)) }}
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-2">{{ $relacionado->nombre }}</h5>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i>{{ $relacionado->ubicacion }}
                        </p>
                        <a href="{{ route('proyectos.show', $relacionado->id) }}" class="btn btn-outline-primary w-100">
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

<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="h1 fw-bold mb-3">¿Interesado en un proyecto similar?</h2>
        <p class="lead mb-4">Contáctanos y te ayudaremos a planificar y ejecutar tu proyecto</p>
        <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
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
    const map = L.map('map').setView([{{ $proyecto->coordenadas['lat'] }}, {{ $proyecto->coordenadas['lng'] }}], 15);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    
    L.marker([{{ $proyecto->coordenadas['lat'] }}, {{ $proyecto->coordenadas['lng'] }}])
        .addTo(map)
        .bindPopup('<b>{{ $proyecto->nombre }}</b><br>{{ $proyecto->ubicacion }}')
        .openPopup();
</script>
@endif
@endpush