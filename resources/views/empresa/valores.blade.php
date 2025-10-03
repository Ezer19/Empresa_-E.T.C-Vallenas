@extends('layouts.app')

@section('title', 'Valores Corporativos - ETC Vallenas')
@section('description', 'Conoce los valores y principios que guían a ETC Vallenas en cada proyecto que realizamos.')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3 text-white">Nuestros Valores</h1>
                <p class="lead text-white mb-0">
                    Los principios que guían cada decisión y acción en ETC Vallenas
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="bg-white p-3 rounded shadow d-inline-block">
                    <i class="fas fa-heart text-primary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Valores Principales -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title mb-3">Valores que nos Definen</h2>
            <p class="lead text-muted">Estos son los pilares fundamentales de nuestra cultura organizacional</p>
        </div>
        
        <div class="row g-4">
            <!-- Valor 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt text-primary fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Integridad</h4>
                        <p class="text-muted mb-0">
                            Actuamos con honestidad y transparencia en todas nuestras operaciones, manteniendo 
                            siempre la ética profesional y cumpliendo nuestros compromisos.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Valor 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-trophy text-success fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Excelencia</h4>
                        <p class="text-muted mb-0">
                            Buscamos constantemente superar las expectativas de nuestros clientes, 
                            ofreciendo servicios de la más alta calidad y equipos en óptimas condiciones.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Valor 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-handshake text-warning fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Compromiso</h4>
                        <p class="text-muted mb-0">
                            Nos comprometemos con el éxito de cada proyecto de nuestros clientes, 
                            brindando apoyo continuo y soluciones efectivas.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Valor 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-hard-hat text-danger fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Seguridad</h4>
                        <p class="text-muted mb-0">
                            La seguridad de nuestros colaboradores y clientes es prioridad. Cumplimos 
                            rigurosamente con todas las normas de seguridad industrial.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Valor 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-lightbulb text-info fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Innovación</h4>
                        <p class="text-muted mb-0">
                            Adoptamos constantemente nuevas tecnologías y métodos para mejorar 
                            nuestros servicios y ofrecer soluciones más eficientes.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Valor 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <div class="icon-box bg-secondary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-leaf text-secondary fa-3x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Responsabilidad Ambiental</h4>
                        <p class="text-muted mb-0">
                            Trabajamos de manera responsable con el medio ambiente, implementando 
                            prácticas sostenibles en todas nuestras operaciones.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Misión y Visión -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body p-5">
                        <div class="icon-box bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-bullseye fa-2x"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Nuestra Misión</h3>
                        <p class="text-muted mb-0">
                            Brindar servicios de alquiler de maquinaria pesada de la más alta calidad, 
                            contribuyendo al éxito de los proyectos de construcción e infraestructura 
                            en la región de Cusco y el sur del Perú, mediante equipos modernos, 
                            personal capacitado y un servicio al cliente excepcional.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card border-0 shadow h-100">
                    <div class="card-body p-5">
                        <div class="icon-box bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Nuestra Visión</h3>
                        <p class="text-muted mb-0">
                            Ser la empresa líder en alquiler de maquinaria pesada en el sur del Perú, 
                            reconocida por nuestra excelencia operativa, innovación constante y 
                            compromiso con el desarrollo sostenible, expandiendo nuestros servicios 
                            a nivel nacional para el año 2030.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Código de Conducta -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title mb-3">Nuestro Código de Conducta</h2>
            <p class="lead text-muted">Principios que guían el comportamiento de todo nuestro equipo</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 bg-light h-100">
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Respeto mutuo:</strong> Tratamos a todos con dignidad y respeto
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Cumplimiento legal:</strong> Respetamos todas las leyes y regulaciones
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Confidencialidad:</strong> Protegemos la información de nuestros clientes
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Trabajo en equipo:</strong> Colaboramos para alcanzar objetivos comunes
                            </li>
                            <li class="mb-0">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Mejora continua:</strong> Buscamos constantemente formas de mejorar
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card border-0 bg-light h-100">
                    <div class="card-body p-4">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Puntualidad:</strong> Cumplimos con nuestros compromisos a tiempo
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Calidad garantizada:</strong> Entregamos servicios de excelencia
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Comunicación efectiva:</strong> Mantenemos diálogo abierto y transparente
                            </li>
                            <li class="mb-3">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Responsabilidad social:</strong> Contribuimos al desarrollo comunitario
                            </li>
                            <li class="mb-0">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <strong>Cuidado ambiental:</strong> Minimizamos nuestro impacto ecológico
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding bg-primary text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">¿Compartes Nuestros Valores?</h2>
        <p class="lead mb-4">Únete a nosotros y sé parte de un equipo comprometido con la excelencia</p>
        <div class="d-flex gap-2 justify-content-center flex-wrap">
            <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg">
                <i class="fas fa-envelope me-2"></i>Contáctanos
            </a>
            <a href="{{ route('empresa.index') }}" class="btn btn-outline-light btn-lg">
                <i class="fas fa-building me-2"></i>Conoce Más
            </a>
        </div>
    </div>
</section>
@endsection
