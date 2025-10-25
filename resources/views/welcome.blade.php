<!DOCTYPE html>
<html lang="es-PE" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>ETC Vallenas - Alquiler de Maquinaria Pesada | Cusco, Perú</title>
    
    <meta name="description" content="Empresa líder en alquiler de maquinaria pesada en Cusco. Más de 15 años de experiencia en construcción, minería y proyectos industriales.">
    <meta name="keywords" content="alquiler maquinaria pesada, Cusco, construcción, minería, excavadoras, volquetes, grúas">
    <meta name="author" content="ETC Vallenas">
    
    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/icons/favicon-16x16.png') }}">
    
    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
          crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "ETC Vallenas",
        "url": "https://www.etcvallenas.com",
        "logo": "https://www.etcvallenas.com/assets/images/logo.png",
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
</head>
<body class="d-flex flex-column h-100">
    <!-- Skip Links -->
    <a href="#main-content" class="visually-hidden-focusable">Saltar al contenido principal</a>

    <!-- Header -->
    <header class="sticky-top bg-white shadow-sm" style="z-index: 1030;">
        <!-- Top Bar -->
        <div class="bg-primary text-white py-2 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="d-flex flex-wrap align-items-center gap-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone fa-sm me-2"></i>
                                <a href="tel:+51984123456" class="text-white text-decoration-none small">+51 984 123 456</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope fa-sm me-2"></i>
                                <a href="mailto:vallenasfernando43@gmail.com" class="text-white text-decoration-none small">vallenasfernando43@gmail.com</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt fa-sm me-2"></i>
                                <span class="small">Cusco, Perú</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex justify-content-lg-end align-items-center gap-3">
                            <a href="https://www.facebook.com/etcvallenas" class="text-white text-decoration-none" 
                               target="_blank" aria-label="Síguenos en Facebook">
                                <i class="fab fa-facebook-f fa-sm"></i>
                            </a>
                            <a href="https://www.instagram.com/etcvallenas" class="text-white text-decoration-none" 
                               target="_blank" aria-label="Síguenos en Instagram">
                                <i class="fab fa-instagram fa-sm"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/etcvallenas" class="text-white text-decoration-none" 
                               target="_blank" aria-label="Síguenos en LinkedIn">
                                <i class="fab fa-linkedin-in fa-sm"></i>
                            </a>
                            <a href="https://wa.me/51984123456" class="text-white text-decoration-none" 
                               target="_blank" aria-label="Escríbenos por WhatsApp">
                                <i class="fab fa-whatsapp fa-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}" aria-label="ETC Vallenas - Página de inicio">
                    <img src="{{ asset('assets/images/logo.png') }}" 
                         alt="ETC Vallenas - Alquiler de Maquinaria Pesada" 
                         width="140" height="65" 
                         class="img-fluid" loading="eager">
                </a>
                
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarNav" aria-controls="navbarNav" 
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto gap-2">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('home') ? 'active bg-primary text-white' : '' }}" 
                               href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link fw-semibold px-3 py-2 rounded-3 dropdown-toggle 
                                      {{ request()->routeIs('empresa.*') ? 'active bg-primary text-white' : '' }}" 
                               href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Empresa
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg">
                                <li><a class="dropdown-item py-2" href="{{ route('empresa.index') }}">Sobre Nosotros</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('empresa.historia') }}">Historia</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('empresa.valores') }}">Valores</a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('empresa.certificaciones') }}">Certificaciones</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('servicios.*') ? 'active bg-primary text-white' : '' }}" 
                               href="{{ route('servicios.index') }}">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('maquinaria.*') ? 'active bg-primary text-white' : '' }}" 
                               href="{{ route('maquinaria.index') }}">Maquinaria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('proyectos.*') ? 'active bg-primary text-white' : '' }}" 
                               href="{{ route('proyectos.index') }}">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('blog.*') ? 'active bg-primary text-white' : '' }}" 
                               href="{{ route('blog.index') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('contacto.*') ? 'active bg-primary text-white' : '' }}" 
                               href="{{ route('contacto.index') }}">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main id="main-content" class="flex-shrink-0">
        <!-- Hero Section -->
        <section class="bg-gradient-primary text-white py-5">
            <div class="container py-5">
                <div class="row align-items-center min-vh-50">
                    <div class="col-lg-8 mx-auto text-center">
                        <h1 class="display-4 fw-bold mb-4">ETC Vallenas</h1>
                        <p class="lead mb-4 fs-5">
                            Líderes en alquiler de maquinaria pesada en Cusco con más de 15 años de experiencia
                        </p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                                <i class="fas fa-paper-plane me-2"></i>Solicitar Cotización
                            </a>
                            <a href="{{ route('maquinaria.index') }}" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                                <i class="fas fa-truck-monster me-2"></i>Ver Maquinaria
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

        <!-- CTA Section -->
        <section class="py-5 bg-primary text-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h3 class="fw-bold mb-3">¿Listo para comenzar tu proyecto?</h3>
                        <p class="mb-0">Contáctanos hoy mismo y recibe una cotización personalizada</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                            <i class="fas fa-phone me-2"></i>Contactar Ahora
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-auto">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/logo.png') }}" 
                         alt="ETC Vallenas" 
                         width="140" height="65" 
                         class="img-fluid mb-3">
                    <p class="mb-3">
                        Empresa líder en alquiler de maquinaria pesada con más de 15 años de experiencia 
                        en construcción, minería y proyectos industriales.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="https://www.facebook.com/etcvallenas" class="text-white text-decoration-none" 
                           target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f fa-lg"></i>
                        </a>
                        <a href="https://www.instagram.com/etcvallenas" class="text-white text-decoration-none" 
                           target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/etcvallenas" class="text-white text-decoration-none" 
                           target="_blank" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in fa-lg"></i>
                        </a>
                        <a href="https://wa.me/51984123456" class="text-white text-decoration-none" 
                           target="_blank" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Contacto</h5>
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex align-items-start">
                            <i class="fas fa-phone mt-1 me-3 text-primary"></i>
                            <div>
                                <a href="tel:+51984123456" class="text-white text-decoration-none">+51 984 123 456</a>
                                <p class="small text-muted mb-0">Lun - Vie: 7:00 AM - 6:00 PM</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="fas fa-envelope mt-1 me-3 text-primary"></i>
                            <div>
                                <a href="mailto:vallenasfernando43@gmail.com" class="text-white text-decoration-none">
                                    vallenasfernando43@gmail.com
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="fas fa-map-marker-alt mt-1 me-3 text-primary"></i>
                            <div>
                                <p class="mb-0">Av. Los Incas 123</p>
                                <p class="small text-muted mb-0">Cusco, Perú</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-3">Enlaces Rápidos</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="{{ route('servicios.index') }}" class="text-white text-decoration-none">Servicios</a></li>
                                <li class="mb-2"><a href="{{ route('maquinaria.index') }}" class="text-white text-decoration-none">Maquinaria</a></li>
                                <li class="mb-2"><a href="{{ route('proyectos.index') }}" class="text-white text-decoration-none">Proyectos</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-white text-decoration-none">Blog</a></li>
                                <li class="mb-2"><a href="{{ route('contacto.index') }}" class="text-white text-decoration-none">Contacto</a></li>
                                <li class="mb-2"><a href="{{ route('empresa.certificaciones') }}" class="text-white text-decoration-none">Certificaciones</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4 border-secondary">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2025 E.T.C. Vallenas. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 small">
                        Desarrollado por 
                        <a href="https://www.instagram.com/ezerzuniga.oficial16/" class="text-primary text-decoration-none" target="_blank">
                            Ezer Zuñiga
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>