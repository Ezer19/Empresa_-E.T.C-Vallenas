@extends('layouts.app')

@section('title', 'Soporte Técnico - ETC Vallenas')
@section('description', 'Centro de soporte técnico de ETC Vallenas. Obtén ayuda con tu equipo, reporta problemas y encuentra soluciones rápidas.')

@section('content')
<!-- Header de Soporte -->
<section class="py-5" style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%);">
    <div class="container">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <div class="mb-4">
                    <i class="fas fa-headset fa-4x mb-3"></i>
                </div>
                <h1 class="display-4 fw-bold mb-3">Centro de Soporte</h1>
                <p class="lead mb-0">
                    Estamos aquí para ayudarte. Encuentra respuestas rápidas o contacta con nuestro equipo técnico.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Opciones de Contacto Rápido -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-phone text-primary fa-2x"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Llamada Directa</h6>
                        <p class="small text-muted mb-2">Lun - Sáb: 7am - 7pm</p>
                        <a href="tel:+51984123456" class="btn btn-sm btn-primary">
                            <i class="fas fa-phone me-2"></i>Llamar Ahora
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fab fa-whatsapp text-success fa-2x"></i>
                        </div>
                        <h6 class="fw-bold mb-2">WhatsApp 24/7</h6>
                        <p class="small text-muted mb-2">Respuesta inmediata</p>
                        <a href="https://wa.me/51984123456" target="_blank" class="btn btn-sm btn-success">
                            <i class="fab fa-whatsapp me-2"></i>Chat Ahora
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-exclamation-triangle text-danger fa-2x"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Emergencias</h6>
                        <p class="small text-muted mb-2">Línea de emergencia</p>
                        <a href="tel:+51984123456" class="btn btn-sm btn-danger">
                            <i class="fas fa-ambulance me-2"></i>Emergencia
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-envelope text-info fa-2x"></i>
                        </div>
                        <h6 class="fw-bold mb-2">Email</h6>
                        <p class="small text-muted mb-2">Respuesta en 24hrs</p>
                        <a href="mailto:soporte@etcvallenas.com" class="btn btn-sm btn-info">
                            <i class="fas fa-envelope me-2"></i>Enviar Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Formulario de Soporte y FAQs -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Formulario de Ticket -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-4">
                            <i class="fas fa-ticket-alt me-2 text-primary"></i>
                            Crear Ticket de Soporte
                        </h3>
                        
                        <form method="POST" action="{{ route('contacto.soporte.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row g-3">
                                <!-- Tipo de Solicitud -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tipo de Solicitud <span class="text-danger">*</span></label>
                                    <select name="tipo_solicitud" class="form-select" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="problema_tecnico">Problema Técnico</option>
                                        <option value="consulta_general">Consulta General</option>
                                        <option value="mantenimiento">Solicitud de Mantenimiento</option>
                                        <option value="reclamo">Reclamo</option>
                                        <option value="sugerencia">Sugerencia</option>
                                        <option value="emergencia">Emergencia</option>
                                    </select>
                                    @error('tipo_solicitud')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Prioridad -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Prioridad <span class="text-danger">*</span></label>
                                    <select name="prioridad" class="form-select" required>
                                        <option value="baja">Baja</option>
                                        <option value="media" selected>Media</option>
                                        <option value="alta">Alta</option>
                                        <option value="critica">Crítica</option>
                                    </select>
                                    @error('prioridad')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Nombre Completo -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nombre Completo <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="nombre" 
                                           class="form-control @error('nombre') is-invalid @enderror" 
                                           value="{{ old('nombre', Auth::user()->nombre ?? '') }}"
                                           required>
                                    @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           name="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email', Auth::user()->email ?? '') }}"
                                           required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Teléfono -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Teléfono <span class="text-danger">*</span></label>
                                    <input type="tel" 
                                           name="telefono" 
                                           class="form-control @error('telefono') is-invalid @enderror" 
                                           value="{{ old('telefono', Auth::user()->telefono ?? '') }}"
                                           required>
                                    @error('telefono')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Empresa -->
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Empresa</label>
                                    <input type="text" 
                                           name="empresa" 
                                           class="form-control" 
                                           value="{{ old('empresa', Auth::user()->empresa ?? '') }}">
                                </div>
                                
                                <!-- Equipo/Maquinaria (si aplica) -->
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Equipo o Maquinaria (si aplica)</label>
                                    <input type="text" 
                                           name="equipo" 
                                           class="form-control" 
                                           placeholder="Ej: Excavadora CAT 320">
                                </div>
                                
                                <!-- Asunto -->
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Asunto <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           name="asunto" 
                                           class="form-control @error('asunto') is-invalid @enderror" 
                                           value="{{ old('asunto') }}"
                                           placeholder="Resumen breve del problema o consulta"
                                           required>
                                    @error('asunto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Descripción -->
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Descripción Detallada <span class="text-danger">*</span></label>
                                    <textarea name="descripcion" 
                                              class="form-control @error('descripcion') is-invalid @enderror" 
                                              rows="6" 
                                              placeholder="Por favor, describe el problema o consulta con el mayor detalle posible..."
                                              required>{{ old('descripcion') }}</textarea>
                                    @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Adjuntar Archivos -->
                                <div class="col-md-12">
                                    <label class="form-label fw-bold">Adjuntar Archivos</label>
                                    <input type="file" 
                                           name="archivos[]" 
                                           class="form-control" 
                                           multiple
                                           accept="image/*,.pdf,.doc,.docx">
                                    <small class="text-muted">Puedes adjuntar fotos, documentos o videos (máx. 10MB por archivo)</small>
                                </div>
                                
                                <!-- Botón Enviar -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Enviar Ticket de Soporte
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar con FAQs y Recursos -->
            <div class="col-lg-5">
                <!-- FAQs -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-question-circle me-2 text-primary"></i>
                            Preguntas Frecuentes
                        </h5>
                        
                        <div class="accordion" id="faqAccordion">
                            <!-- FAQ 1 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#faq1">
                                        ¿Cuál es el tiempo de respuesta?
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Nuestro tiempo de respuesta promedio es de 2-4 horas en horario laboral. 
                                        Para emergencias, ofrecemos atención inmediata las 24 horas.
                                    </div>
                                </div>
                            </div>
                            
                            <!-- FAQ 2 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#faq2">
                                        ¿Tienen servicio técnico en campo?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Sí, contamos con técnicos especializados que se desplazan a tu ubicación 
                                        en Cusco y zonas cercanas para mantenimiento y reparaciones.
                                    </div>
                                </div>
                            </div>
                            
                            <!-- FAQ 3 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#faq3">
                                        ¿Qué incluye el mantenimiento preventivo?
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        El mantenimiento incluye revisión completa del equipo, cambio de filtros, 
                                        aceites, inspección de sistemas hidráulicos y eléctricos, y reporte detallado.
                                    </div>
                                </div>
                            </div>
                            
                            <!-- FAQ 4 -->
                            <div class="accordion-item border-0 mb-3">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" 
                                            data-bs-toggle="collapse" data-bs-target="#faq4">
                                        ¿Puedo rastrear el estado de mi ticket?
                                    </button>
                                </h2>
                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Sí, recibirás un código de ticket que podrás usar para consultar el estado 
                                        en tu panel de usuario o contactando a nuestro equipo.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recursos de Ayuda -->
                <div class="card border-0 shadow-sm mb-4 bg-primary text-white">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-book me-2"></i>Recursos de Ayuda
                        </h6>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action border-0 bg-transparent text-white">
                                <i class="fas fa-file-pdf me-2"></i>Manuales de Usuario
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 bg-transparent text-white">
                                <i class="fas fa-video me-2"></i>Tutoriales en Video
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 bg-transparent text-white">
                                <i class="fas fa-tools me-2"></i>Guías de Mantenimiento
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 bg-transparent text-white">
                                <i class="fas fa-shield-alt me-2"></i>Normas de Seguridad
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Horarios de Atención -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-clock me-2 text-primary"></i>Horarios de Atención
                        </h6>
                        <table class="table table-sm mb-0">
                            <tbody>
                                <tr>
                                    <td><strong>Lunes - Viernes:</strong></td>
                                    <td>7:00 AM - 7:00 PM</td>
                                </tr>
                                <tr>
                                    <td><strong>Sábados:</strong></td>
                                    <td>8:00 AM - 2:00 PM</td>
                                </tr>
                                <tr>
                                    <td><strong>Domingos:</strong></td>
                                    <td>Solo emergencias</td>
                                </tr>
                                <tr>
                                    <td><strong>Emergencias 24/7:</strong></td>
                                    <td class="text-danger fw-bold">+51 984 123 456</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Estadísticas de Soporte -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Nuestro Compromiso con tu Satisfacción</h2>
            <p class="text-muted">Números que respaldan nuestra calidad de servicio</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-clock text-primary fa-3x mb-3"></i>
                        <h3 class="fw-bold mb-2">2-4 Horas</h3>
                        <p class="text-muted mb-0">Tiempo de Respuesta Promedio</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-smile text-success fa-3x mb-3"></i>
                        <h3 class="fw-bold mb-2">98%</h3>
                        <p class="text-muted mb-0">Satisfacción del Cliente</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-headset text-info fa-3x mb-3"></i>
                        <h3 class="fw-bold mb-2">24/7</h3>
                        <p class="text-muted mb-0">Soporte de Emergencias</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <i class="fas fa-users text-warning fa-3x mb-3"></i>
                        <h3 class="fw-bold mb-2">15+</h3>
                        <p class="text-muted mb-0">Técnicos Especializados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Validación adicional del formulario
document.querySelector('form').addEventListener('submit', function(e) {
    const prioridad = document.querySelector('[name="prioridad"]').value;
    const tipo = document.querySelector('[name="tipo_solicitud"]').value;
    
    // Confirmar si es una emergencia
    if (tipo === 'emergencia' || prioridad === 'critica') {
        e.preventDefault();
        Swal.fire({
            title: '¿Es una emergencia?',
            text: 'Para emergencias críticas, te recomendamos llamar directamente al +51 984 123 456',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Enviar Ticket',
            cancelButtonText: 'Llamar Ahora'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                window.location.href = 'tel:+51984123456';
            }
        });
    }
});

// Mensaje de éxito si viene de envío exitoso
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: '¡Ticket Enviado!',
        text: '{{ session("success") }}',
        confirmButtonColor: '#1565C0'
    });
@endif
</script>
@endpush
