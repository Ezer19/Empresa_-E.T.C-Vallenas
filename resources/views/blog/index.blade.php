@extends('layouts.app')

@section('title', 'Blog - ETC Vallenas')
@section('description', 'Lee los últimos artículos sobre maquinaria pesada, construcción y proyectos en el blog de ETC
    Vallenas.')

@section('content')
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

    <section class="py-4 bg-light">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-6 col-md-6">
                    <input type="text" class="form-control" placeholder="Buscar artículos..." id="searchInput">
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

    <section class="section-padding">
        <div class="container">
            <div class="row g-4">
                @foreach ($articulos as $articulo)
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow h-100 hover-scale">
                            <img src="{{ asset('storage/blog/' . $articulo->imagen_principal) }}" class="card-img-top"
                                alt="{{ $articulo->titulo }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <div class="mb-2">
                                    <span class="badge bg-{{ $categoriaColors[$articulo->categoria] ?? 'primary' }}">
                                        {{ ucfirst($articulo->categoria) }}
                                    </span>
                                    <span class="text-muted small ms-2">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ \Carbon\Carbon::parse($articulo->fecha_publicacion)->format('d M Y') }}
                                    </span>
                                </div>
                                <h5 class="card-title fw-bold mb-2">{{ $articulo->titulo }}</h5>
                                <p class="text-muted mb-3">{{ Str::limit($articulo->resumen, 120) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-muted small">
                                        <i class="fas fa-user me-1"></i>{{ $articulo->autor }}
                                    </div>
                                    <a href="{{ route('blog.show', $articulo->slug) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Leer más <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($articulos->hasPages())
                <div class="mt-5 d-flex justify-content-center">
                    <nav>
                        <ul class="pagination">
                            @if ($articulos->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $articulos->previousPageUrl() }}"><i
                                            class="fas fa-chevron-left"></i></a>
                                </li>
                            @endif

                            @foreach (range(1, $articulos->lastPage()) as $page)
                                <li class="page-item {{ $articulos->currentPage() == $page ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $articulos->url($page) }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($articulos->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $articulos->nextPageUrl() }}"><i
                                            class="fas fa-chevron-right"></i></a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </section>

    <section class="section-padding bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <h3 class="fw-bold mb-2">Suscríbete a Nuestro Newsletter</h3>
                    <p class="mb-0">Recibe las últimas noticias y artículos directamente en tu correo</p>
                </div>
                <div class="col-lg-6">
                    <form class="row g-2" action="{{ route('newsletter.subscribe') }}" method="POST">
                        @csrf
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Tu email"
                                required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-light btn-lg w-100">Suscribirse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .hero-section {
            background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%)
        }

        .hover-scale {
            transition: transform 0.3s ease
        }

        .hover-scale:hover {
            transform: translateY(-5px)
        }

        .bg-noticias {
            background-color: #ffc107 !important
        }

        .bg-consejos {
            background-color: #198754 !important
        }

        .bg-proyectos {
            background-color: #0dcaf0 !important
        }

        .bg-maquinaria {
            background-color: #6f42c1 !important
        }

        .bg-seguridad {
            background-color: #dc3545 !important
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const articles = document.querySelectorAll('.col-lg-4.col-md-6');

            function filterArticles() {
                const searchTerm = searchInput.value.toLowerCase();
                const category = categoryFilter.value;

                articles.forEach(article => {
                    const title = article.querySelector('.card-title').textContent.toLowerCase();
                    const articleCategory = article.querySelector('.badge').textContent.toLowerCase()
                .trim();
                    const matchesSearch = title.includes(searchTerm);
                    const matchesCategory = !category || articleCategory === category;

                    if (matchesSearch && matchesCategory) {
                        article.style.display = 'block';
                    } else {
                        article.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterArticles);
            categoryFilter.addEventListener('change', filterArticles);
        });
    </script>
@endpush
