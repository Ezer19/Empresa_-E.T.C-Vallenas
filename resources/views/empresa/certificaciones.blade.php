@extends('layouts.app')

@section('title', 'Certificaciones y Acreditaciones - ETC Vallenas')
@section('description', 'Conoce nuestras certificaciones internacionales y acreditaciones que garantizan la calidad de nuestros servicios.')

@section('content')
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <i class="fas fa-certificate fa-4x mb-3"></i>
                </div>
                <h1 class="display-5 fw-bold mb-3">Certificaciones y Acreditaciones</h1>
                <p class="lead mb-0">
                    Nuestro compromiso con la excelencia respaldado por certificaciones nacionales e internacionales
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-4 bg-light">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-award fa-lg"></i>
                        </div>
                        <h3 class="fw-bold mb-1">12+</h3>
                        <p class="text-muted mb-0 small">Certificaciones Activas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-shield-alt fa-lg"></i>
                        </div>
                        <h3 class="fw-bold mb-1">100%</h3>
                        <p class="text-muted mb-0 small">Cumplimiento Normativo</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-globe fa-lg"></i>
                        </div>
                        <h3 class="fw-bold mb-1">ISO</h3>
                        <p class="text-muted mb-0 small">Estándares Internacionales</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-calendar-check fa-lg"></i>
                        </div>
                        <h3 class="fw-bold mb-1">15+</h3>
                        <p class="text-muted mb-0 small">Años de Trayectoria</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Nuestras Certificaciones</h2>
            <p class="text-muted lead">Avaladas por organismos nacionales e internacionales</p>
        </div>

        <div class="row g-4">
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-check-circle fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">ISO 9001:2015</h4>
                        <span class="badge bg-success mb-3">Vigente</span>
                        <p class="text-muted mb-3">
                            Sistema de Gestión de Calidad que garantiza la excelencia en nuestros procesos 
                            y servicios de alquiler de maquinaria pesada.
                        </p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Gestión de procesos optimizada
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Mejora continua de servicios
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Satisfacción del cliente garantizada
                            </li>
                        </ul>
                        <hr>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-2"></i>Certificado desde: 2018
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-leaf fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">ISO 14001:2015</h4>
                        <span class="badge bg-success mb-3">Vigente</span>
                        <p class="text-muted mb-3">
                            Sistema de Gestión Ambiental que demuestra nuestro compromiso con 
                            la protección del medio ambiente y la sostenibilidad.
                        </p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Reducción de impacto ambiental
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Gestión responsable de recursos
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Cumplimiento normativo ambiental
                            </li>
                        </ul>
                        <hr>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-2"></i>Certificado desde: 2019
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="bg-danger text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-hard-hat fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">ISO 45001:2018</h4>
                        <span class="badge bg-success mb-3">Vigente</span>
                        <p class="text-muted mb-3">
                            Sistema de Gestión de Seguridad y Salud en el Trabajo que garantiza 
                            condiciones seguras para nuestro personal y clientes.
                        </p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Prevención de riesgos laborales
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Capacitación continua del personal
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Cero accidentes como objetivo
                            </li>
                        </ul>
                        <hr>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-2"></i>Certificado desde: 2020
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-id-card fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">RNP</h4>
                        <span class="badge bg-success mb-3">Vigente</span>
                        <p class="text-muted mb-3">
                            Registro Nacional de Proveedores del Estado Peruano, 
                            que nos habilita para contratar con entidades públicas.
                        </p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Capacidad legal y técnica verificada
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Experiencia comprobada
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Solvencia económica certificada
                            </li>
                        </ul>
                        <hr>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-2"></i>Certificado desde: 2015
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-users-cog fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">SUNAFIL</h4>
                        <span class="badge bg-success mb-3">Vigente</span>
                        <p class="text-muted mb-3">
                            Cumplimiento certificado de las normas laborales y de seguridad 
                            establecidas por la Superintendencia Nacional de Fiscalización Laboral.
                        </p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Condiciones laborales óptimas
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Derechos laborales respetados
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Seguridad en el trabajo garantizada
                            </li>
                        </ul>
                        <hr>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-2"></i>Última inspección: 2024
                        </small>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4 text-center">
                        <div class="bg-secondary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-tools fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Certificación Técnica</h4>
                        <span class="badge bg-success mb-3">Vigente</span>
                        <p class="text-muted mb-3">
                            Personal técnico certificado y capacitado en el manejo y mantenimiento 
                            de maquinaria pesada por instituciones especializadas.
                        </p>
                        <ul class="list-unstyled text-start small">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Operadores certificados
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Técnicos especializados
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                Capacitación continua
                            </li>
                        </ul>
                        <hr>
                        <small class="text-muted">
                            <i class="fas fa-calendar-alt me-2"></i>Renovación anual
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Otras Certificaciones y Membresías</h2>
            <p class="text-muted lead">Reconocimientos y afiliaciones que respaldan nuestro trabajo</p>
        </div>

        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="fas fa-industry text-primary fa-3x mb-3"></i>
                        <h6 class="fw-bold mb-2">Cámara de Comercio</h6>
                        <p class="text-muted small mb-0">Miembro activo de la CCR Cusco</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="fas fa-handshake text-success fa-3x mb-3"></i>
                        <h6 class="fw-bold mb-2">CAPECO</h6>
                        <p class="text-muted small mb-0">Cámara Peruana de la Construcción</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="fas fa-certificate text-warning fa-3x mb-3"></i>
                        <h6 class="fw-bold mb-2">OHSAS 18001</h6>
                        <p class="text-muted small mb-0">Seguridad y Salud Ocupacional</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <i class="fas fa-file-contract text-info fa-3x mb-3"></i>
                        <h6 class="fw-bold mb-2">Buenas Prácticas</h6>
                        <p class="text-muted small mb-0">Código de Buenas Prácticas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Nuestro Proceso de Certificación</h2>
            <p class="text-muted lead">Cómo mantenemos nuestros estándares de calidad</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold" style="font-size: 2rem;">1</span>
                    </div>
                    <h5 class="fw-bold mb-3">Evaluación Inicial</h5>
                    <p class="text-muted">
                        Auditoría completa de nuestros procesos, equipos y sistemas de gestión.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold" style="font-size: 2rem;">2</span>
                    </div>
                    <h5 class="fw-bold mb-3">Implementación</h5>
                    <p class="text-muted">
                        Adaptación de procesos según los estándares requeridos por cada certificación.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold" style="font-size: 2rem;">3</span>
                    </div>
                    <h5 class="fw-bold mb-3">Auditoría Externa</h5>
                    <p class="text-muted">
                        Certificación por organismos internacionales reconocidos y acreditados.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="text-center">
                    <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px;">
                        <span class="fw-bold" style="font-size: 2rem;">4</span>
                    </div>
                    <h5 class="fw-bold mb-3">Mejora Continua</h5>
                    <p class="text-muted">
                        Auditorías periódicas y actualización constante de nuestros procesos.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="fw-bold mb-3">
                    <i class="fas fa-shield-alt me-2"></i>
                    Nuestro Compromiso con la Excelencia
                </h3>
                <p class="mb-0 opacity-75">
                    Todas nuestras certificaciones son auditadas anualmente para garantizar el cumplimiento 
                    continuo de los más altos estándares de calidad, seguridad y responsabilidad ambiental. 
                    Trabajamos constantemente para mantener y mejorar nuestras acreditaciones.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                    <i class="fas fa-envelope me-2"></i>Solicitar Información
                </a>
            </div>
        </div>
    </div>
</section>
@endsection