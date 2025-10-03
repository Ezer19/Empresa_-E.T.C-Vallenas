@extends('layouts.app')

@section('title', 'Configuración - ETC Vallenas')

@section('content')
<!-- Header Section -->
<section class="py-4 bg-light">
    <div class="container">
        <h1 class="h3 fw-bold mb-0">Configuración</h1>
        <p class="text-muted mb-0">Personaliza tus preferencias y ajustes de la cuenta</p>
    </div>
</section>

<!-- Configuración Content -->
<section class="section-padding">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        <div class="row g-4">
            <!-- Menú Lateral -->
            <div class="col-lg-3">
                <div class="card border-0 shadow">
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#notificaciones" 
                               class="list-group-item list-group-item-action active" 
                               data-bs-toggle="list">
                                <i class="fas fa-bell me-2"></i>Notificaciones
                            </a>
                            <a href="#privacidad" 
                               class="list-group-item list-group-item-action" 
                               data-bs-toggle="list">
                                <i class="fas fa-lock me-2"></i>Privacidad
                            </a>
                            <a href="#seguridad" 
                               class="list-group-item list-group-item-action" 
                               data-bs-toggle="list">
                                <i class="fas fa-shield-alt me-2"></i>Seguridad
                            </a>
                            <a href="#preferencias" 
                               class="list-group-item list-group-item-action" 
                               data-bs-toggle="list">
                                <i class="fas fa-cog me-2"></i>Preferencias
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contenido de Configuración -->
            <div class="col-lg-9">
                <div class="tab-content">
                    <!-- Notificaciones -->
                    <div class="tab-pane fade show active" id="notificaciones">
                        <div class="card border-0 shadow">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4">
                                    <i class="fas fa-bell me-2"></i>Configuración de Notificaciones
                                </h5>
                                
                                <form action="{{ route('usuario.configuracion.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipo" value="notificaciones">
                                    
                                    <div class="mb-4">
                                        <h6 class="fw-bold mb-3">Notificaciones por Email</h6>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="email_nuevos_servicios" 
                                                   id="emailNuevosServicios" 
                                                   checked>
                                            <label class="form-check-label" for="emailNuevosServicios">
                                                Nuevos servicios y promociones
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="email_actualizaciones" 
                                                   id="emailActualizaciones" 
                                                   checked>
                                            <label class="form-check-label" for="emailActualizaciones">
                                                Actualizaciones de proyectos
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="email_newsletter" 
                                                   id="emailNewsletter">
                                            <label class="form-check-label" for="emailNewsletter">
                                                Newsletter mensual
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h6 class="fw-bold mb-3">Notificaciones en el Sistema</h6>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="sistema_mensajes" 
                                                   id="sistemaMensajes" 
                                                   checked>
                                            <label class="form-check-label" for="sistemaMensajes">
                                                Mensajes y comunicaciones
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="sistema_alertas" 
                                                   id="sistemaAlertas" 
                                                   checked>
                                            <label class="form-check-label" for="sistemaAlertas">
                                                Alertas importantes
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Guardar Cambios
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Privacidad -->
                    <div class="tab-pane fade" id="privacidad">
                        <div class="card border-0 shadow">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4">
                                    <i class="fas fa-lock me-2"></i>Configuración de Privacidad
                                </h5>
                                
                                <form action="{{ route('usuario.configuracion.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipo" value="privacidad">
                                    
                                    <div class="mb-4">
                                        <h6 class="fw-bold mb-3">Visibilidad del Perfil</h6>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="visibilidad_perfil" 
                                                   id="perfilPublico" 
                                                   value="publico">
                                            <label class="form-check-label" for="perfilPublico">
                                                <strong>Público</strong>
                                                <br><small class="text-muted">Tu perfil es visible para todos</small>
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="visibilidad_perfil" 
                                                   id="perfilPrivado" 
                                                   value="privado" 
                                                   checked>
                                            <label class="form-check-label" for="perfilPrivado">
                                                <strong>Privado</strong>
                                                <br><small class="text-muted">Solo visible para administradores</small>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h6 class="fw-bold mb-3">Compartir Información</h6>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="compartir_empresa" 
                                                   id="compartirEmpresa">
                                            <label class="form-check-label" for="compartirEmpresa">
                                                Mostrar información de mi empresa
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="compartir_telefono" 
                                                   id="compartirTelefono">
                                            <label class="form-check-label" for="compartirTelefono">
                                                Mostrar mi número de teléfono
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Guardar Cambios
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Seguridad -->
                    <div class="tab-pane fade" id="seguridad">
                        <div class="card border-0 shadow">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4">
                                    <i class="fas fa-shield-alt me-2"></i>Configuración de Seguridad
                                </h5>
                                
                                <form action="{{ route('usuario.configuracion.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipo" value="seguridad">
                                    
                                    <div class="mb-4">
                                        <h6 class="fw-bold mb-3">Contraseña</h6>
                                        <p class="text-muted">
                                            Última actualización: 
                                            {{ Auth::user()->updated_at ? \Carbon\Carbon::parse(Auth::user()->updated_at)->format('d/m/Y') : 'N/A' }}
                                        </p>
                                        <a href="{{ route('usuario.perfil') }}" class="btn btn-outline-primary">
                                            <i class="fas fa-key me-2"></i>Cambiar Contraseña
                                        </a>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h6 class="fw-bold mb-3">Autenticación en Dos Pasos</h6>
                                        <p class="text-muted">
                                            Añade una capa extra de seguridad a tu cuenta
                                        </p>
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="autenticacion_dos_pasos" 
                                                   id="autenticacionDosPasos">
                                            <label class="form-check-label" for="autenticacionDosPasos">
                                                Activar autenticación en dos pasos
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <h6 class="fw-bold mb-3">Sesiones Activas</h6>
                                        <p class="text-muted">
                                            Estás conectado desde los siguientes dispositivos:
                                        </p>
                                        <div class="list-group">
                                            <div class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <i class="fas fa-desktop text-primary me-2"></i>
                                                        <strong>Windows PC</strong>
                                                        <br><small class="text-muted">Última actividad: Hoy a las 10:30 AM</small>
                                                    </div>
                                                    <span class="badge bg-success">Actual</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Guardar Cambios
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preferencias -->
                    <div class="tab-pane fade" id="preferencias">
                        <div class="card border-0 shadow">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4">
                                    <i class="fas fa-cog me-2"></i>Preferencias Generales
                                </h5>
                                
                                <form action="{{ route('usuario.configuracion.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipo" value="preferencias">
                                    
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Idioma</label>
                                        <select class="form-select" name="idioma">
                                            <option value="es" selected>Español</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Zona Horaria</label>
                                        <select class="form-select" name="zona_horaria">
                                            <option value="America/Lima" selected>Lima (GMT-5)</option>
                                            <option value="America/New_York">Nueva York (GMT-4)</option>
                                            <option value="Europe/Madrid">Madrid (GMT+1)</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Formato de Fecha</label>
                                        <select class="form-select" name="formato_fecha">
                                            <option value="dd/mm/yyyy" selected>DD/MM/YYYY</option>
                                            <option value="mm/dd/yyyy">MM/DD/YYYY</option>
                                            <option value="yyyy-mm-dd">YYYY-MM-DD</option>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Guardar Cambios
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
