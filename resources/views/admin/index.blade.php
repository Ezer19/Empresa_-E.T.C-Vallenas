@extends('layouts.app')

@section('title', 'Panel de Administración - ETC Vallenas')

@section('content')
<!-- Header Section -->
<section class="py-4 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="h3 fw-bold mb-0">Panel de Administración</h1>
                <p class="mb-0 opacity-75">Sistema de gestión ETC Vallenas</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <span class="badge bg-light text-primary">Administrador</span>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<section class="section-padding">
    <div class="container">
        <!-- Estadísticas Generales -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-users text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1 small">Usuarios Totales</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['total_usuarios'] ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-truck-monster text-success fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1 small">Maquinaria</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['total_maquinaria'] ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-building text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1 small">Proyectos Activos</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['proyectos_activos'] ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                                <i class="fas fa-tools text-info fa-2x"></i>
                            </div>
                            <div>
                                <h6 class="text-muted mb-1 small">Servicios</h6>
                                <h3 class="fw-bold mb-0">{{ $estadisticas['total_servicios'] ?? 0 }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Gestión Principal -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-cog me-2"></i>Gestión Principal
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <a href="{{ route('admin.usuarios') }}" class="text-decoration-none">
                                    <div class="card border-0 bg-light h-100 hover-shadow">
                                        <div class="card-body text-center p-4">
                                            <i class="fas fa-users text-primary" style="font-size: 3rem;"></i>
                                            <h6 class="fw-bold mt-3 mb-1">Gestión de Usuarios</h6>
                                            <p class="text-muted small mb-0">Administrar usuarios del sistema</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-6">
                                <a href="{{ route('admin.maquinaria') }}" class="text-decoration-none">
                                    <div class="card border-0 bg-light h-100 hover-shadow">
                                        <div class="card-body text-center p-4">
                                            <i class="fas fa-truck-monster text-success" style="font-size: 3rem;"></i>
                                            <h6 class="fw-bold mt-3 mb-1">Gestión de Maquinaria</h6>
                                            <p class="text-muted small mb-0">Administrar equipos y maquinaria</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-6">
                                <a href="{{ route('admin.proyectos') }}" class="text-decoration-none">
                                    <div class="card border-0 bg-light h-100 hover-shadow">
                                        <div class="card-body text-center p-4">
                                            <i class="fas fa-building text-warning" style="font-size: 3rem;"></i>
                                            <h6 class="fw-bold mt-3 mb-1">Gestión de Proyectos</h6>
                                            <p class="text-muted small mb-0">Administrar proyectos activos</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-6">
                                <a href="{{ route('admin.servicios') }}" class="text-decoration-none">
                                    <div class="card border-0 bg-light h-100 hover-shadow">
                                        <div class="card-body text-center p-4">
                                            <i class="fas fa-tools text-info" style="font-size: 3rem;"></i>
                                            <h6 class="fw-bold mt-3 mb-1">Gestión de Servicios</h6>
                                            <p class="text-muted small mb-0">Administrar servicios ofrecidos</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Actividad Reciente -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-history me-2"></i>Actividad Reciente del Sistema
                        </h5>
                        
                        @if(isset($actividad_reciente) && count($actividad_reciente) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Acción</th>
                                        <th>Módulo</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($actividad_reciente as $actividad)
                                    <tr>
                                        <td>{{ $actividad['usuario'] }}</td>
                                        <td>
                                            <i class="fas fa-{{ $actividad['icono'] }} text-primary me-2"></i>
                                            {{ $actividad['accion'] }}
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $actividad['modulo'] }}</span>
                                        </td>
                                        <td class="text-muted small">
                                            {{ \Carbon\Carbon::parse($actividad['fecha'])->diffForHumans() }}
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
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Acciones Rápidas -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-bolt me-2"></i>Acciones Rápidas
                        </h6>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-primary text-start" data-bs-toggle="modal" data-bs-target="#nuevoUsuarioModal">
                                <i class="fas fa-user-plus me-2"></i>Nuevo Usuario
                            </button>
                            <button type="button" class="btn btn-outline-success text-start" data-bs-toggle="modal" data-bs-target="#nuevaMaquinariaModal">
                                <i class="fas fa-plus me-2"></i>Nueva Maquinaria
                            </button>
                            <button type="button" class="btn btn-outline-warning text-start" data-bs-toggle="modal" data-bs-target="#nuevoProyectoModal">
                                <i class="fas fa-folder-plus me-2"></i>Nuevo Proyecto
                            </button>
                            <button type="button" class="btn btn-outline-info text-start" data-bs-toggle="modal" data-bs-target="#nuevoServicioModal">
                                <i class="fas fa-plus-circle me-2"></i>Nuevo Servicio
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Estadísticas Adicionales -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-chart-pie me-2"></i>Estado de Maquinaria
                        </h6>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small>Disponible</small>
                                <small class="fw-bold text-success">
                                    {{ $estadisticas['maquinaria_disponible'] ?? 0 }}
                                </small>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-success" 
                                     style="width: {{ ($estadisticas['maquinaria_disponible'] ?? 0) / max(($estadisticas['total_maquinaria'] ?? 1), 1) * 100 }}%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small>En Uso</small>
                                <small class="fw-bold text-warning">
                                    {{ $estadisticas['maquinaria_en_uso'] ?? 0 }}
                                </small>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-warning" 
                                     style="width: {{ ($estadisticas['maquinaria_en_uso'] ?? 0) / max(($estadisticas['total_maquinaria'] ?? 1), 1) * 100 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between mb-1">
                                <small>Mantenimiento</small>
                                <small class="fw-bold text-danger">
                                    {{ $estadisticas['maquinaria_mantenimiento'] ?? 0 }}
                                </small>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-danger" 
                                     style="width: {{ ($estadisticas['maquinaria_mantenimiento'] ?? 0) / max(($estadisticas['total_maquinaria'] ?? 1), 1) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Información del Sistema -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-info-circle me-2"></i>Información del Sistema
                        </h6>
                        <div class="mb-2">
                            <small class="text-muted">Versión:</small>
                            <span class="float-end"><strong>1.0.0</strong></span>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">Última actualización:</small>
                            <span class="float-end"><strong>{{ date('d/m/Y') }}</strong></span>
                        </div>
                        <div>
                            <small class="text-muted">Desarrollado por:</small>
                            <span class="float-end"><strong>Ezer B. Zuñiga Chura</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
