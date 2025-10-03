<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>ETC Vallenas - Empresa de Alquiler de Maquinaria Pesada | Cusco, Perú</title>
    
    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon (1).ico') }}">
    
    <!-- CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Skip Links -->
    <a href="#main-content" class="skip-link">Saltar al contenido principal</a>

    <!-- Header -->
    <header class="position-sticky top-0" style="z-index: 1020;">
        <div class="top-bar text-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="contact-info">
                            <i class="fas fa-phone me-2"></i>
                            <a href="tel:+51984123456" class="text-white text-decoration-none">+51 984 123 456</a>
                            <i class="fas fa-envelope ms-3 me-2"></i>
                            <a href="mailto:vallenasfernando43@gmail.com" class="text-white text-decoration-none">vallenasfernando43@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="social-links d-flex justify-content-end align-items-center gap-3">
                            <a href="https://www.facebook.com/etcvallenas" class="text-white text-decoration-none" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/etcvallenas" class="text-white text-decoration-none" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/etcvallenas" class="text-white text-decoration-none" target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="ETC Vallenas" width="110" height="55" class="img-fluid">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Empresa</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('empresa.index') }}">Sobre Nosotros</a></li>
                                <li><a class="dropdown-item" href="{{ route('empresa.historia') }}">Historia</a></li>
                                <li><a class="dropdown-item" href="{{ route('empresa.valores') }}">Valores</a></li>
                                <li><a class="dropdown-item" href="{{ route('empresa.certificaciones') }}">Certificaciones</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servicios.index') }}">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('maquinaria.index') }}">Maquinaria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('proyectos.index') }}">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacto.index') }}">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main id="main-content">
        <h1 class="display-4 text-center my-5">🚛 ETC Vallenas</h1>
        <div class="container">
            <div class="alert alert-info">
                <h4>✅ ¡Laravel está funcionando correctamente!</h4>
                <p>Tu estructura profesional está lista. Ahora puedes:</p>
                <ol>
                    <li>Convertir tu HTML a vistas Blade</li>
                    <li>Crear los controladores restantes</li>
                    <li>Implementar autenticación</li>
                    <li>Agregar funcionalidad CRUD</li>
                </ol>
                <p class="mb-0"><strong>Consulta el archivo INSTALACION.md para más detalles</strong></p>
            </div>
            
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-truck-monster fa-3x text-primary mb-3"></i>
                            <h5>85+ Equipos</h5>
                            <p>Maquinaria moderna disponible</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-project-diagram fa-3x text-success mb-3"></i>
                            <h5>450+ Proyectos</h5>
                            <p>Completados exitosamente</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-3x text-warning mb-3"></i>
                            <h5>280+ Clientes</h5>
                            <p>Satisfechos con nuestro servicio</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>ETC Vallenas</h5>
                    <p>Empresa líder en alquiler de maquinaria pesada con más de 15 años de experiencia.</p>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>
                        <i class="fas fa-phone me-2"></i> +51 984 123 456<br>
                        <i class="fas fa-envelope me-2"></i> vallenasfernando43@gmail.com<br>
                        <i class="fas fa-map-marker-alt me-2"></i> Av. Los Incas 123, Cusco
                    </p>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in fa-2x"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 E.T.C. Vallenas - Todos los derechos reservados</p>
                <p class="small mt-2">Desarrollado por <a href="https://www.instagram.com/ezerzuniga.oficial16/" class="text-primary" target="_blank">Ezer Zuñiga</a></p>
            </div>
        </div>
    </footer>
</body>
</html>
