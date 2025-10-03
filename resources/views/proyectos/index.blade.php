@extends('layouts.app')

@section('title', 'Nuestros Proyectos - ETC Vallenas')
@section('description', 'Conoce los más de 450 proyectos completados con éxito por ETC Vallenas en todo el Perú.')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3 text-white">Nuestros Proyectos</h1>
                <p class="lead text-white mb-0">
                    Más de 450 proyectos completados exitosamente en todo el Perú
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="bg-white p-3 rounded shadow d-inline-block">
                    <i class="fas fa-building text-primary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filtros -->
<section class="py-4 bg-light">
    <div class="container">
        <form action="{{ route('proyectos.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <input type="text" 
                           name="buscar" 
                           class="form-control" 
                           placeholder="Buscar proyectos..."
                           value="{{ request('buscar') }}">
                </div>
                <div class="col-lg-3 col-md-6">
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
                    <select name="estado" class="form-select">
                        <option value="">Todos los estados</option>
                        <option value="completado" {{ request('estado') == 'completado' ? 'selected' : '' }}>
                            Completado
                        </option>
                        <option value="en_progreso" {{ request('estado') == 'en_progreso' ? 'selected' : '' }}>
                            En progreso
                        </option>
                        <option value="pausado" {{ request('estado') == 'pausado' ? 'selected' : '' }}>
                            Pausado
                        </option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-6">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-2"></i>Buscar
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Listado de Proyectos -->
<section class="section-padding">
    <div class="container">
        @if($proyectos->count() > 0)
        <div class="row g-4">
            @foreach($proyectos as $proyecto)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-shadow">
                    <!-- Imagen -->
                    <div class="position-relative">
                        @if($proyecto->imagenes && count($proyecto->imagenes) > 0)
                        <img src="{{ asset('storage/proyectos/' . $proyecto->imagenes[0]) }}" 
                             class="card-img-top" 
                             alt="{{ $proyecto->nombre }}"
                             style="height: 250px; object-fit: cover;">
                        @else
                        <img src="{{ asset('assets/images/proyecto-placeholder.jpg') }}" 
                             class="card-img-top" 
                             alt="{{ $proyecto->nombre }}"
                             style="height: 250px; object-fit: cover;">
                        @endif
                        
                        <!-- Badge de estado -->
                        <span class="position-absolute top-0 end-0 m-3">
                            @if($proyecto->estado == 'completado')
                            <span class="badge bg-success">Completado</span>
                            @elseif($proyecto->estado == 'en_progreso')
                            <span class="badge bg-primary">En Progreso</span>
                            @else
                            <span class="badge bg-warning">Pausado</span>
                            @endif
                        </span>
                    </div>
                    
                    <div class="card-body">
                        <!-- Tipo -->
                        <span class="badge bg-secondary mb-2">
                            {{ ucfirst(str_replace('_', ' ', $proyecto->tipo)) }}
                        </span>
                        
                        <!-- Nombre -->
                        <h5 class="card-title fw-bold mb-2">{{ $proyecto->nombre }}</h5>
                        
                        <!-- Cliente y Ubicación -->
                        <p class="text-muted small mb-3">
                            <i class="fas fa-user me-1"></i>{{ $proyecto->cliente }}
                            <br>
                            <i class="fas fa-map-marker-alt me-1"></i>{{ $proyecto->ubicacion }}
                        </p>
                        
                        <!-- Fechas -->
                        <div class="mb-3">
                            <small class="text-muted d-block">
                                <i class="fas fa-calendar me-1"></i>Inicio: {{ \Carbon\Carbon::parse($proyecto->fecha_inicio)->format('d/m/Y') }}
                            </small>
                            @if($proyecto->fecha_fin)
                            <small class="text-muted d-block">
                                <i class="fas fa-calendar-check me-1"></i>Fin: {{ \Carbon\Carbon::parse($proyecto->fecha_fin)->format('d/m/Y') }}
                            </small>
                            @endif
                        </div>
                        
                        <!-- Progreso -->
                        @if($proyecto->avance_porcentaje)
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small class="text-muted">Progreso</small>
                                <small class="fw-bold">{{ $proyecto->avance_porcentaje }}%</small>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar" 
                                     role="progressbar" 
                                     style="width: {{ $proyecto->avance_porcentaje }}%"
                                     aria-valuenow="{{ $proyecto->avance_porcentaje }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                        @endif
                        
                        <!-- Presupuesto -->
                        @if($proyecto->presupuesto)
                        <p class="mb-3">
                            <strong class="text-primary">Presupuesto:</strong> 
                            S/ {{ number_format($proyecto->presupuesto, 2) }}
                        </p>
                        @endif
                        
                        <!-- Botón -->
                        <a href="{{ route('proyectos.show', $proyecto->_id) }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-2"></i>Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Paginación -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $proyectos->links() }}
        </div>
        
        @else
        <!-- Sin resultados -->
        <div class="text-center py-5">
            <i class="fas fa-search text-muted" style="font-size: 4rem;"></i>
            <h3 class="mt-3">No se encontraron proyectos</h3>
            <p class="text-muted">Intenta con otros criterios de búsqueda</p>
            <a href="{{ route('proyectos.index') }}" class="btn btn-primary">
                <i class="fas fa-redo me-2"></i>Ver Todos
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">¿Tienes un proyecto en mente?</h2>
                <p class="mb-0">
                    Contáctanos y te ayudaremos a hacer realidad tu proyecto con nuestros equipos y experiencia
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
