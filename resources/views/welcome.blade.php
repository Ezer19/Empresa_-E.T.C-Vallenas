@extends('layouts.app')

@section('title', 'ETC Vallenas - Alquiler de Maquinaria Pesada | Cusco, Perú')
@section('description',
    'Empresa líder en alquiler de maquinaria pesada en Cusco. Más de 15 años de experiencia en
    construcción, minería y proyectos industriales.')

    @push('styles')
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "ETC Vallenas",
        "url": "https://www.etcvallenas.com",
        "logo": "{{ asset('assets/images/logo.svg') }}",
        "description": "Empresa líder en alquiler de maquinaria pesada en Cusco, Perú",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Av. Los Incas 123",
            "addressLocality": "Cusco",
            "addressCountry": "PE"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+51-984-123-456",
            "contactType": "customer service",
            "email": "vallenasfernando43@gmail.com"
        }
    }
    </script>
    @endpush

@section('content')
    <!-- Hero estilo Maquiperu: navy con tipografía fuerte y CTA naranja -->
    <section class="bg-gradient-primary text-white py-5">
        <div class="container py-5">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="display-4 fw-extrabold mb-3" style="letter-spacing:.5px">
                        Maquinarias que impulsan tus proyectos
                    </h1>
                    <p class="lead mb-4 fs-5 text-white-75">
                        ETC Vallenas | Alquiler de maquinaria pesada en Cusco con más de 15 años de experiencia.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('maquinaria.index') }}" class="btn btn-primary btn-lg px-4 py-3 fw-semibold">
                            <i class="fas fa-truck-monster me-2"></i>Ver Maquinaria
                        </a>
                        <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                            <i class="fas fa-paper-plane me-2"></i>Solicitar Cotización
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body py-4 px-3">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-truck-monster fa-2x"></i>
                            </div>
                            <h3 class="fw-bold text-primary mb-2">85+</h3>
                            <h6 class="text-muted mb-0">Equipos Modernos</h6>
                            <p class="small text-muted mt-2">Maquinaria de última generación</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body py-4 px-3">
                            <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-project-diagram fa-2x"></i>
                            </div>
                            <h3 class="fw-bold text-success mb-2">450+</h3>
                            <h6 class="text-muted mb-0">Proyectos</h6>
                            <p class="small text-muted mt-2">Completados exitosamente</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body py-4 px-3">
                            <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <h3 class="fw-bold text-warning mb-2">280+</h3>
                            <h6 class="text-muted mb-0">Clientes</h6>
                            <p class="small text-muted mt-2">Satisfechos con nuestro servicio</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section con acento naranja -->
    <section class="py-5 text-white" style="background: linear-gradient(90deg, var(--brand-orange) 0%, #f18a52 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">¿Listo para empezar?</h3>
                    <p class="mb-0">Solicita una cotización y te asesoramos en minutos.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                        <i class="fas fa-phone me-2"></i>Contactar Ahora
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
