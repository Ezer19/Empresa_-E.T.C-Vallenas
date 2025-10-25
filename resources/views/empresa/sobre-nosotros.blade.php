@extends('layouts.app')

@section('title', 'Sobre Nosotros - ETC Vallenas')
@section('description', 'Conoce más sobre ETC Vallenas, nuestra misión, visión, equipo y compromiso con la excelencia en alquiler de maquinaria pesada en Cusco.')

@section('content')
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <i class="fas fa-users fa-4x mb-3"></i>
                </div>
                <h1 class="display-5 fw-bold mb-3">Sobre Nosotros</h1>
                <p class="lead mb-0">Conoce a ETC Vallenas, líderes en alquiler de maquinaria pesada en Cusco</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/empresa/equipo-1.jpg') }}" 
                         alt="Equipo ETC Vallenas"
                         class="img-fluid rounded-3 shadow-lg">
                    <div class="position-absolute bottom-0 start-0 m-4 bg-primary text-white p-3 rounded-3">
                        <h3 class="fw-bold mb-0">15+</h3>
                        <p class="mb-0 small">Años de Experiencia</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="badge bg-primary mb-3">Nuestra Empresa</span>
                <h2 class="h1 fw-bold mb-4">¿Quiénes Somos?</h2>
                <p class="text-muted mb-3">
                    <strong>ETC Vallenas</strong> es una empresa peruana con sede en Cusco, especializada 
                    en el alquiler de maquinaria pesada y equipos para la construcción. Fundada en 2010, 
                    nos hemos consolidado como líderes en el sector gracias a nuestro compromiso con 
                    la calidad, seguridad y satisfacción del cliente.
                </p>
                <p class="text-muted mb-3">
                    Contamos con una amplia flota de maquinaria de última generación, personal altamente 
                    calificado y una trayectoria impecable en la ejecución de proyectos de construcción 
                    civil, minería, infraestructura vial y obras hidráulicas.
                </p>
                <p class="text-muted mb-4">
                    Nuestra misión es proporcionar soluciones integrales de alquiler de maquinaria 
                    que impulsen el desarrollo de proyectos en todo el sur del Perú, manteniendo 
                    los más altos estándares de calidad y seguridad.
                </p>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-success fa-2x me-3"></i>
                            <div>
                                <h5 class="fw-bold mb-0">85+</h5>
                                <small class="text-muted">Equipos Disponibles</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users text-primary fa-2x me-3"></i>
                            <div>
                                <h5 class="fw-bold mb-0">280+</h5>
                                <small class="text-muted">Clientes Satisfechos</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-5">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-bullseye fa-2x"></i>
                        </div>
                        <h3 class="fw-bold mb-4">Nuestra Misión</h3>
                        <p class="text-muted mb-0">
                            Proporcionar servicios de alquiler de maquinaria pesada de la más alta calidad, 
                            contribuyendo al desarrollo de proyectos de construcción e infraestructura en 
                            la región sur del Perú, mediante equipos modernos, personal capacitado y un 
                            compromiso inquebrantable con la seguridad, eficiencia y satisfacción total 
                            de nuestros clientes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-5">
                        <div class="bg-success text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                        <h3 class="fw-bold mb-4">Nuestra Visión</h3>
                        <p class="text-muted mb-0">
                            Ser reconocidos como la empresa líder en alquiler de maquinaria pesada en el 
                            sur del Perú para el 2030, destacándonos por nuestra innovación tecnológica, 
                            excelencia operativa y compromiso con el desarrollo sostenible. Aspiramos a 
                            expandir nuestros servicios a nivel nacional, manteniéndonos siempre como 
                            referentes de calidad y confiabilidad en el sector.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">Valores Corporativos</span>
            <h2 class="h1 fw-bold mb-3">Lo Que Nos Define</h2>
            <p class="text-muted lead">Principios que guían cada una de nuestras acciones</p>
        </div>

        <div class="row g-4">
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Integridad</h5>
                        <p class="text-muted mb-0">
                            Actuamos con honestidad y transparencia en todas nuestras operaciones y relaciones comerciales.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-trophy fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Excelencia</h5>
                        <p class="text-muted mb-0">
                            Buscamos la perfección en cada servicio, superando las expectativas de nuestros clientes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Compromiso</h5>
                        <p class="text-muted mb-0">
                            Nos dedicamos plenamente a cumplir nuestras promesas y alcanzar los objetivos de nuestros clientes.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-danger text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-hard-hat fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Seguridad</h5>
                        <p class="text-muted mb-0">
                            La seguridad de nuestro personal y clientes es nuestra máxima prioridad en todas las operaciones.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-lightbulb fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Innovación</h5>
                        <p class="text-muted mb-0">
                            Adoptamos nuevas tecnologías y métodos para mejorar continuamente nuestros servicios.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-leaf fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Sostenibilidad</h5>
                        <p class="text-muted mb-0">
                            Operamos de manera responsable con el medio ambiente y las comunidades donde trabajamos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">Nuestro Equipo</span>
            <h2 class="h1 fw-bold mb-3">El Corazón de ETC Vallenas</h2>
            <p class="text-muted lead">Profesionales comprometidos con tu éxito</p>
        </div>

        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Fernando Vallenas</h5>
                        <p class="text-primary small mb-3">Director General</p>
                        <p class="text-muted small mb-3">
                            Ingeniero Civil con más de 20 años de experiencia en el sector de construcción y maquinaria pesada.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 35px; height: 35px;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 35px; height: 35px;">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-1">María González</h5>
                        <p class="text-success small mb-3">Gerente de Operaciones</p>
                        <p class="text-muted small mb-3">
                            Especialista en gestión de flotas y logística con certificación internacional en maquinaria pesada.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-sm btn-outline-success rounded-circle" style="width: 35px; height: 35px;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-success rounded-circle" style="width: 35px; height: 35px;">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Carlos Huamán</h5>
                        <p class="text-warning small mb-3">Jefe de Mantenimiento</p>
                        <p class="text-muted small mb-3">
                            Ingeniero Mecánico con amplia experiencia en mantenimiento preventivo y correctivo de maquinaria pesada.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-sm btn-outline-warning rounded-circle" style="width: 35px; height: 35px;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-warning rounded-circle" style="width: 35px; height: 35px;">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm text-center transition-all">
                    <div class="card-body p-4">
                        <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 100px; height: 100px;">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Ana Quispe</h5>
                        <p class="text-info small mb-3">Gerente Comercial</p>
                        <p class="text-muted small mb-3">
                            Administradora con expertise en ventas B2B y desarrollo de relaciones comerciales estratégicas.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="btn btn-sm btn-outline-info rounded-circle" style="width: 35px; height: 35px;">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-outline-info rounded-circle" style="width: 35px; height: 35px;">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Números que Nos Respaldan</h2>
            <p class="opacity-75 lead">Nuestra experiencia en cifras</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-xl-3 col-md-6">
                <div>
                    <h2 class="display-3 fw-bold mb-2">450+</h2>
                    <p class="mb-0 opacity-75">Proyectos Completados</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div>
                    <h2 class="display-3 fw-bold mb-2">85+</h2>
                    <p class="mb-0 opacity-75">Equipos en Flota</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div>
                    <h2 class="display-3 fw-bold mb-2">280+</h2>
                    <p class="mb-0 opacity-75">Clientes Satisfechos</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div>
                    <h2 class="display-3 fw-bold mb-2">15+</h2>
                    <p class="mb-0 opacity-75">Años de Experiencia</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="h2 fw-bold mb-3">¿Listo para trabajar con nosotros?</h3>
                <p class="text-muted lead mb-0">
                    Únete a más de 280 empresas que confían en ETC Vallenas para sus proyectos. 
                    Contáctanos hoy y descubre cómo podemos impulsar tu próximo proyecto.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contacto.index') }}" class="btn btn-primary btn-lg px-4 py-3 fw-semibold me-2 mb-2">
                    <i class="fas fa-envelope me-2"></i>Contáctanos
                </a>
                <a href="{{ route('maquinaria.index') }}" class="btn btn-outline-primary btn-lg px-4 py-3 fw-semibold mb-2">
                    <i class="fas fa-truck-monster me-2"></i>Ver Equipos
                </a>
            </div>
        </div>
    </div>
</section>
@endsection