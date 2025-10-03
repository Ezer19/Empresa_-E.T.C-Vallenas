@extends('layouts.app')

@section('title', 'Dashboard - ETC Vallenas')

@section('content')
<!-- Header Section -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="h3 fw-bold mb-0">Mi Dashboard</h1>
                <p class="text-muted mb-0">Bienvenido, {{ Auth::user()->nombre }}</p>
            </div>
            <div class="col-lg-6 text-lg-end">
                <span class="badge bg-primary">{{ ucfirst(Auth::user()->rol) }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<section class="section-padding">
    <div class="container">
        <!-- Estadísticas Rápidas -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-primary text-white rounded p-3 me-3">
                                <i class="fas fa-file-alt fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Solicitudes</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['solicitudes'] ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-success text-white rounded p-3 me-3">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Aprobadas</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['aprobadas'] ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-warning text-white rounded p-3 me-3">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">Pendientes</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['pendientes'] ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="icon-box bg-info text-white rounded p-3 me-3">
                                <i class="fas fa-truck-monster fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1">En Uso</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['en_uso'] ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Actividad Reciente -->
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-history me-2"></i>Actividad Reciente
                        </h5>
                        
                        @if(isset($actividad_reciente) && count($actividad_reciente) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Descripción</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($actividad_reciente as $actividad)
                                    <tr>
                                        <td>
                                            <i class="fas fa-{{ $actividad['icono'] }} text-primary me-2"></i>
                                            {{ $actividad['tipo'] }}
                                        </td>
                                        <td>{{ $actividad['descripcion'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($actividad['fecha'])->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $actividad['estado_color'] }}">
                                                {{ $actividad['estado'] }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No hay actividad reciente</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Accesos Rápidos -->
            <div class="col-lg-4">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-bolt me-2"></i>Accesos Rápidos
                        </h5>
                        <div class="d-grid gap-2">
                            <a href="{{ route('maquinaria.index') }}" class="btn btn-outline-primary text-start">
                                <i class="fas fa-truck-monster me-2"></i>Ver Maquinaria
                            </a>
                            <a href="{{ route('servicios.index') }}" class="btn btn-outline-primary text-start">
                                <i class="fas fa-tools me-2"></i>Ver Servicios
                            </a>
                            <a href="{{ route('proyectos.index') }}" class="btn btn-outline-primary text-start">
                                <i class="fas fa-building me-2"></i>Ver Proyectos
                            </a>
                            <a href="{{ route('contacto.index') }}" class="btn btn-outline-primary text-start">
                                <i class="fas fa-envelope me-2"></i>Contactar Soporte
                            </a>
                            <a href="{{ route('usuario.perfil') }}" class="btn btn-outline-primary text-start">
                                <i class="fas fa-user me-2"></i>Mi Perfil
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Información del Usuario -->
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-user-circle me-2"></i>Mi Información
                        </h5>
                        <div class="mb-3">
                            <small class="text-muted d-block">Nombre</small>
                            <strong>{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</strong>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Email</small>
                            <strong>{{ Auth::user()->email }}</strong>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Teléfono</small>
                            <strong>{{ Auth::user()->telefono }}</strong>
                        </div>
                        @if(Auth::user()->empresa)
                        <div class="mb-3">
                            <small class="text-muted d-block">Empresa</small>
                            <strong>{{ Auth::user()->empresa }}</strong>
                        </div>
                        @endif
                        <div class="mb-0">
                            <small class="text-muted d-block">Rol</small>
                            <span class="badge bg-primary">{{ ucfirst(Auth::user()->rol) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
