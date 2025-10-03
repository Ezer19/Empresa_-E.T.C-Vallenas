@extends('layouts.app')

@section('title', 'Sobre Nosotros - ETC Vallenas')
@section('description', 'Conoce más sobre ETC Vallenas, empresa líder en alquiler de maquinaria pesada en Cusco con más de 15 años de experiencia.')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-3 fw-bold mb-4 text-white">Sobre ETC Vallenas</h1>
                <p class="lead text-white mb-4">
                    Más de 15 años liderando el sector de alquiler de maquinaria pesada en Cusco, 
                    brindando soluciones confiables para construcción y minería.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('empresa.historia') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-book me-2"></i>Nuestra Historia
                    </a>
                    <a href="{{ route('contacto.index') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contáctanos
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('assets/images/volvo2.jpg') }}" alt="ETC Vallenas" class="img-fluid rounded shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Estadísticas -->
<section class="stats-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <i class="fas fa-truck-monster text-primary mb-3" style="font-size: 3rem;"></i>
                    <div class="stat-number counter" data-target="85">0</div>
                    <div class="stat-label">Equipos Disponibles</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <i class="fas fa-project-diagram text-success mb-3" style="font-size: 3rem;"></i>
                    <div class="stat-number counter" data-target="450">0</div>
                    <div class="stat-label">Proyectos Completados</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <i class="fas fa-users text-warning mb-3" style="font-size: 3rem;"></i>
                    <div class="stat-number counter" data-target="280">0</div>
                    <div class="stat-label">Clientes Satisfechos</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <i class="fas fa-calendar-alt text-danger mb-3" style="font-size: 3rem;"></i>
                    <div class="stat-number counter" data-target="15">0</div>
                    <div class="stat-label">Años de Experiencia</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Misión y Visión -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow hover-shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-bullseye text-primary" style="font-size: 4rem;"></i>
                        </div>
                        <h3 class="fw-bold text-center mb-4">Nuestra Misión</h3>
                        <p class="text-muted text-center">
                            Proporcionar soluciones integrales en alquiler de maquinaria pesada, 
                            garantizando equipos de última generación, operadores certificados y 
                            un servicio de excelencia que supere las expectativas de nuestros clientes 
                            en los sectores de construcción y minería.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow hover-shadow">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="fas fa-eye text-secondary" style="font-size: 4rem;"></i>
                        </div>
                        <h3 class="fw-bold text-center mb-4">Nuestra Visión</h3>
                        <p class="text-muted text-center">
                            Ser la empresa líder en el sur del Perú en servicios de maquinaria pesada, 
                            reconocida por nuestra innovación tecnológica, compromiso con la seguridad y 
                            excelencia operacional, contribuyendo al desarrollo sostenible de la región.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ¿Por qué elegirnos? -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">¿Por Qué Elegirnos?</h2>
            <p class="section-subtitle">Razones que nos hacen tu mejor opción</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-shield-alt text-primary mb-3" style="font-size: 3rem;"></i>
                        <h4 class="fw-bold mb-3">Equipos Certificados</h4>
                        <p class="text-muted">
                            Toda nuestra flota cuenta con certificaciones vigentes y 
                            mantenimiento preventivo constante.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-users-cog text-success mb-3" style="font-size: 3rem;"></i>
                        <h4 class="fw-bold mb-3">Personal Capacitado</h4>
                        <p class="text-muted">
                            Operadores con certificación nacional e internacional, 
                            expertos en seguridad y eficiencia operativa.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-clock text-warning mb-3" style="font-size: 3rem;"></i>
                        <h4 class="fw-bold mb-3">Disponibilidad 24/7</h4>
                        <p class="text-muted">
                            Soporte técnico y atención al cliente las 24 horas del día, 
                            los 7 días de la semana.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-dollar-sign text-info mb-3" style="font-size: 3rem;"></i>
                        <h4 class="fw-bold mb-3">Precios Competitivos</h4>
                        <p class="text-muted">
                            Tarifas justas y flexibles adaptadas a las necesidades 
                            de cada proyecto.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-leaf text-success mb-3" style="font-size: 3rem;"></i>
                        <h4 class="fw-bold mb-3">Compromiso Ambiental</h4>
                        <p class="text-muted">
                            Equipos con tecnología ECO para reducir el impacto 
                            ambiental en cada operación.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-handshake text-primary mb-3" style="font-size: 3rem;"></i>
                        <h4 class="fw-bold mb-3">Confianza y Experiencia</h4>
                        <p class="text-muted">
                            Más de 15 años respaldando proyectos exitosos en 
                            construcción y minería.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="section-padding" style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%);">
    <div class="container">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-4">¿Listo para tu Próximo Proyecto?</h2>
                <p class="lead mb-4">
                    Contáctanos hoy y descubre cómo podemos ayudarte a alcanzar tus objetivos
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-envelope me-2"></i>Solicitar Cotización
                    </a>
                    <a href="{{ route('maquinaria.index') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-truck-monster me-2"></i>Ver Maquinaria
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
