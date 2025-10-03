@extends('layouts.app')

@section('title', 'Nuestra Historia - ETC Vallenas')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-3 fw-bold mb-4 text-white">Nuestra Historia</h1>
                <p class="lead text-white">
                    Un camino de esfuerzo, dedicación y compromiso con Cusco
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Línea de Tiempo -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- 2008 - Fundación -->
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/historia-2008.jpg') }}" alt="Fundación 2008" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-lg-6">
                        <div class="badge bg-primary mb-3">2008</div>
                        <h3 class="fw-bold mb-3">Los Inicios</h3>
                        <p class="text-muted">
                            ETC Vallenas nace en Cusco con la visión de Fernando Vallenas de ofrecer 
                            soluciones confiables en alquiler de maquinaria pesada. Iniciamos con 
                            solo 3 equipos y mucha determinación.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Primera excavadora adquirida</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Primer contrato con constructora local</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Equipo de 5 colaboradores</li>
                        </ul>
                    </div>
                </div>

                <!-- 2012 - Expansión -->
                <div class="row mb-5 flex-lg-row-reverse">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/historia-2012.jpg') }}" alt="Expansión 2012" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-lg-6">
                        <div class="badge bg-success mb-3">2012</div>
                        <h3 class="fw-bold mb-3">Crecimiento y Expansión</h3>
                        <p class="text-muted">
                            Alcanzamos los 20 equipos en nuestra flota y expandimos nuestros servicios 
                            al sector minero. Inauguramos nuestro primer taller de mantenimiento.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>20 equipos en operación</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Taller de mantenimiento propio</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Ingreso al sector minero</li>
                        </ul>
                    </div>
                </div>

                <!-- 2016 - Certificaciones -->
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/historia-2016.jpg') }}" alt="Certificaciones 2016" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-lg-6">
                        <div class="badge bg-warning mb-3">2016</div>
                        <h3 class="fw-bold mb-3">Certificaciones Internacionales</h3>
                        <p class="text-muted">
                            Obtuvimos las primeras certificaciones ISO 9001 y OHSAS 18001, 
                            consolidándonos como empresa líder en calidad y seguridad.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Certificación ISO 9001:2015</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Certificación OHSAS 18001</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>50+ proyectos completados</li>
                        </ul>
                    </div>
                </div>

                <!-- 2020 - Tecnología -->
                <div class="row mb-5 flex-lg-row-reverse">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/historia-2020.jpg') }}" alt="Tecnología 2020" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-lg-6">
                        <div class="badge bg-info mb-3">2020</div>
                        <h3 class="fw-bold mb-3">Transformación Digital</h3>
                        <p class="text-muted">
                            Implementamos sistemas de rastreo GPS en todos nuestros equipos y 
                            lanzamos nuestra plataforma digital para gestión de proyectos.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Sistema GPS en toda la flota</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Plataforma digital operativa</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>70+ equipos modernos</li>
                        </ul>
                    </div>
                </div>

                <!-- 2024 - Presente -->
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/images/historia-2024.jpg') }}" alt="Actualidad 2024" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-lg-6">
                        <div class="badge bg-danger mb-3">2024</div>
                        <h3 class="fw-bold mb-3">Líderes en el Sur del Perú</h3>
                        <p class="text-muted">
                            Hoy contamos con más de 85 equipos de última generación, un equipo de 
                            100+ colaboradores y presencia en los principales proyectos de la región.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>85+ equipos de última tecnología</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>100+ colaboradores</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>450+ proyectos completados</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>280+ clientes satisfechos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Valores CTA -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="text-center">
            <h2 class="section-title">Nuestros Valores nos Definen</h2>
            <p class="section-subtitle mb-4">Conoce los principios que guían nuestro trabajo diario</p>
            <a href="{{ route('empresa.valores') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-heart me-2"></i>Ver Nuestros Valores
            </a>
        </div>
    </div>
</section>
@endsection
