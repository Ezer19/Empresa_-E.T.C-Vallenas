@extends('layouts.app')

@section('title', 'Blog - ETC Vallenas')
@section('description', 'Lee los últimos artículos sobre maquinaria pesada, construcción y proyectos en el blog de ETC Vallenas.')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3 text-white">Blog</h1>
                <p class="lead text-white mb-0">
                    Noticias, consejos y novedades sobre maquinaria pesada y construcción
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="bg-white p-3 rounded shadow d-inline-block">
                    <i class="fas fa-newspaper text-primary" style="font-size: 3rem;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Búsqueda y Filtros -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-6 col-md-6">
                <input type="text" 
                       class="form-control" 
                       placeholder="Buscar artículos..."
                       id="searchInput">
            </div>
            <div class="col-lg-4 col-md-6">
                <select class="form-select" id="categoryFilter">
                    <option value="">Todas las categorías</option>
                    <option value="noticias">Noticias</option>
                    <option value="consejos">Consejos</option>
                    <option value="proyectos">Proyectos</option>
                    <option value="maquinaria">Maquinaria</option>
                    <option value="seguridad">Seguridad</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-6">
                <button class="btn btn-primary w-100">
                    <i class="fas fa-search me-2"></i>Buscar
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Artículos del Blog -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <!-- Artículo 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <img src="{{ asset('assets/images/blog/articulo-1.jpg') }}" 
                         class="card-img-top" 
                         alt="Mantenimiento de Excavadoras"
                         style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-primary">Consejos</span>
                            <span class="text-muted small ms-2">
                                <i class="fas fa-calendar me-1"></i>15 Sep 2025
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-2">
                            Mantenimiento Preventivo de Excavadoras: Guía Completa
                        </h5>
                        <p class="text-muted mb-3">
                            Descubre las mejores prácticas para mantener tus excavadoras en óptimas 
                            condiciones y prolongar su vida útil.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                <i class="fas fa-user me-1"></i>ETC Vallenas
                            </div>
                            <a href="{{ route('blog.articulo', 1) }}" class="btn btn-sm btn-outline-primary">
                                Leer más <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Artículo 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <img src="{{ asset('assets/images/blog/articulo-2.jpg') }}" 
                         class="card-img-top" 
                         alt="Seguridad en Construcción"
                         style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-danger">Seguridad</span>
                            <span class="text-muted small ms-2">
                                <i class="fas fa-calendar me-1"></i>10 Sep 2025
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-2">
                            Normas de Seguridad en Operación de Maquinaria Pesada
                        </h5>
                        <p class="text-muted mb-3">
                            Conoce las normas esenciales de seguridad que todo operador debe seguir 
                            al trabajar con maquinaria pesada.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                <i class="fas fa-user me-1"></i>ETC Vallenas
                            </div>
                            <a href="{{ route('blog.articulo', 2) }}" class="btn btn-sm btn-outline-primary">
                                Leer más <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Artículo 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <img src="{{ asset('assets/images/blog/articulo-3.jpg') }}" 
                         class="card-img-top" 
                         alt="Proyecto Carretera"
                         style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-success">Proyectos</span>
                            <span class="text-muted small ms-2">
                                <i class="fas fa-calendar me-1"></i>5 Sep 2025
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-2">
                            Proyecto de Infraestructura Vial en Cusco
                        </h5>
                        <p class="text-muted mb-3">
                            Participamos en uno de los proyectos viales más importantes de la región, 
                            aportando nuestra experiencia y equipos.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                <i class="fas fa-user me-1"></i>ETC Vallenas
                            </div>
                            <a href="{{ route('blog.articulo', 3) }}" class="btn btn-sm btn-outline-primary">
                                Leer más <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Artículo 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <img src="{{ asset('assets/images/blog/articulo-4.jpg') }}" 
                         class="card-img-top" 
                         alt="Nuevas Tecnologías"
                         style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-info">Maquinaria</span>
                            <span class="text-muted small ms-2">
                                <i class="fas fa-calendar me-1"></i>1 Sep 2025
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-2">
                            Nuevas Tecnologías en Maquinaria de Construcción
                        </h5>
                        <p class="text-muted mb-3">
                            Explora las últimas innovaciones tecnológicas que están revolucionando 
                            el sector de la construcción.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                <i class="fas fa-user me-1"></i>ETC Vallenas
                            </div>
                            <a href="{{ route('blog.articulo', 4) }}" class="btn btn-sm btn-outline-primary">
                                Leer más <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Artículo 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <img src="{{ asset('assets/images/blog/articulo-5.jpg') }}" 
                         class="card-img-top" 
                         alt="Sostenibilidad"
                         style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-success">Consejos</span>
                            <span class="text-muted small ms-2">
                                <i class="fas fa-calendar me-1"></i>28 Ago 2025
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-2">
                            Prácticas Sostenibles en la Construcción
                        </h5>
                        <p class="text-muted mb-3">
                            Cómo implementar prácticas sostenibles en proyectos de construcción 
                            para reducir el impacto ambiental.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                <i class="fas fa-user me-1"></i>ETC Vallenas
                            </div>
                            <a href="{{ route('blog.articulo', 5) }}" class="btn btn-sm btn-outline-primary">
                                Leer más <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Artículo 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    <img src="{{ asset('assets/images/blog/articulo-6.jpg') }}" 
                         class="card-img-top" 
                         alt="Noticias ETC"
                         style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <div class="mb-2">
                            <span class="badge bg-warning">Noticias</span>
                            <span class="text-muted small ms-2">
                                <i class="fas fa-calendar me-1"></i>20 Ago 2025
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-2">
                            ETC Vallenas Amplía su Flota de Equipos
                        </h5>
                        <p class="text-muted mb-3">
                            Incorporamos 15 nuevos equipos de última generación para brindar 
                            mejores servicios a nuestros clientes.
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                <i class="fas fa-user me-1"></i>ETC Vallenas
                            </div>
                            <a href="{{ route('blog.articulo', 6) }}" class="btn btn-sm btn-outline-primary">
                                Leer más <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Paginación -->
        <div class="mt-5 d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <h3 class="fw-bold mb-2">Suscríbete a Nuestro Newsletter</h3>
                <p class="mb-0">Recibe las últimas noticias y artículos directamente en tu correo</p>
            </div>
            <div class="col-lg-6">
                <form class="row g-2">
                    <div class="col-md-8">
                        <input type="email" class="form-control form-control-lg" placeholder="Tu email">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-light btn-lg w-100">
                            Suscribirse
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
