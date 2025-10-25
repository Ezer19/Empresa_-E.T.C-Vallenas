@extends('layouts.app')

@section('title', $articulo->titulo ?? 'Artículo del Blog')
@section('description', Str::limit($articulo->contenido ?? '', 160))

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center text-white">
                <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                    <i class="fas fa-tag me-2"></i>{{ ucfirst($articulo->categoria ?? 'General') }}
                </span>
                <h1 class="display-5 fw-bold mb-3">{{ $articulo->titulo ?? 'Título del Artículo' }}</h1>
                <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap opacity-75">
                    <span><i class="fas fa-user me-2"></i>{{ $articulo->autor ?? 'ETC Vallenas' }}</span>
                    <span><i class="fas fa-calendar me-2"></i>{{ isset($articulo->fecha_publicacion) ? \Carbon\Carbon::parse($articulo->fecha_publicacion)->format('d/m/Y') : date('d/m/Y') }}</span>
                    <span><i class="fas fa-clock me-2"></i>{{ $articulo->tiempo_lectura ?? '5' }} min lectura</span>
                    @if(isset($articulo->visitas))
                    <span><i class="fas fa-eye me-2"></i>{{ number_format($articulo->visitas) }} vistas</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(isset($articulo->imagen_principal))
                <div class="mb-5">
                    <img src="{{ asset('storage/blog/' . $articulo->imagen_principal) }}" 
                         alt="{{ $articulo->titulo }}"
                         class="img-fluid rounded shadow-lg w-100"
                         style="max-height: 500px; object-fit: cover;">
                </div>
                @endif

                <article class="blog-content">
                    {!! $articulo->contenido ?? '<p>Contenido del artículo...</p>' !!}
                </article>

                @if(isset($articulo->tags) && count($articulo->tags) > 0)
                <div class="mt-5 pt-4 border-top">
                    <h6 class="fw-bold mb-3"><i class="fas fa-tags me-2"></i>Etiquetas:</h6>
                    <div class="d-flex gap-2 flex-wrap">
                        @foreach($articulo->tags as $tag)
                        <a href="{{ route('blog.index', ['tag' => $tag]) }}" 
                           class="badge bg-light text-dark text-decoration-none border">#{{ $tag }}</a>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="mt-4 pt-4 border-top">
                    <h6 class="fw-bold mb-3"><i class="fas fa-share-alt me-2"></i>Compartir:</h6>
                    <div class="d-flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                           target="_blank"
                           class="btn btn-outline-primary btn-sm">
                            <i class="fab fa-facebook-f me-2"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($articulo->titulo ?? '') }}" 
                           target="_blank"
                           class="btn btn-outline-info btn-sm">
                            <i class="fab fa-twitter me-2"></i>Twitter
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($articulo->titulo ?? '') }}" 
                           target="_blank"
                           class="btn btn-outline-primary btn-sm">
                            <i class="fab fa-linkedin-in me-2"></i>LinkedIn
                        </a>
                        <a href="https://wa.me/?text={{ urlencode(($articulo->titulo ?? '') . ' ' . url()->current()) }}" 
                           target="_blank"
                           class="btn btn-outline-success btn-sm">
                            <i class="fab fa-whatsapp me-2"></i>WhatsApp
                        </a>
                    </div>
                </div>

                <div class="mt-5 p-4 bg-light rounded">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-user text-white fa-2x"></i>
                            </div>
                        </div>
                        <div class="col">
                            <h5 class="fw-bold mb-1">{{ $articulo->autor ?? 'ETC Vallenas' }}</h5>
                            <p class="text-muted mb-2">
                                {{ $articulo->autor_bio ?? 'Equipo de comunicaciones de ETC Vallenas, empresa líder en alquiler de maquinaria pesada en Cusco.' }}
                            </p>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-decoration-none text-primary"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-decoration-none text-info"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-decoration-none text-primary"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 pt-4 border-top">
                    <div class="row g-3">
                        @if(isset($articulo_anterior))
                        <div class="col-md-6">
                            <a href="{{ route('blog.articulo', $articulo_anterior->_id) }}" 
                               class="card border-0 shadow-sm h-100 text-decoration-none hover-scale">
                                <div class="card-body">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fas fa-arrow-left me-2"></i>Artículo Anterior
                                    </small>
                                    <h6 class="fw-bold text-dark mb-0">{{ $articulo_anterior->titulo }}</h6>
                                </div>
                            </a>
                        </div>
                        @endif
                        
                        @if(isset($articulo_siguiente))
                        <div class="col-md-6">
                            <a href="{{ route('blog.articulo', $articulo_siguiente->_id) }}" 
                               class="card border-0 shadow-sm h-100 text-decoration-none hover-scale text-end">
                                <div class="card-body">
                                    <small class="text-muted d-block mb-2">
                                        Siguiente Artículo<i class="fas fa-arrow-right ms-2"></i>
                                    </small>
                                    <h6 class="fw-bold text-dark mb-0">{{ $articulo_siguiente->titulo }}</h6>
                                </div>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="mt-5 pt-5 border-top">
                    <h4 class="fw-bold mb-4">
                        <i class="fas fa-comments me-2"></i>Comentarios ({{ $articulo->comentarios_count ?? 0 }})
                    </h4>

                    @auth
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('blog.comentario.store', $articulo->_id ?? 1) }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Agregar comentario</label>
                                    <textarea name="comentario" 
                                              class="form-control" 
                                              rows="4" 
                                              placeholder="Escribe tu comentario aquí..." 
                                              required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane me-2"></i>Publicar Comentario
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <a href="{{ route('login') }}">Inicia sesión</a> o 
                        <a href="{{ route('registro') }}">regístrate</a> para comentar.
                    </div>
                    @endauth

                    @if(isset($articulo->comentarios) && count($articulo->comentarios) > 0)
                    <div class="comentarios-list">
                        @foreach($articulo->comentarios as $comentario)
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" 
                                         style="width: 40px; height: 40px; min-width: 40px;">
                                        <i class="fas fa-user text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <strong>{{ $comentario->usuario_nombre ?? 'Usuario' }}</strong>
                                                <small class="text-muted ms-2">
                                                    {{ isset($comentario->fecha) ? \Carbon\Carbon::parse($comentario->fecha)->diffForHumans() : 'Hace un momento' }}
                                                </small>
                                            </div>
                                        </div>
                                        <p class="mb-0">{{ $comentario->texto ?? $comentario->comentario ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center text-muted py-4">
                        <i class="far fa-comments fa-3x mb-3 opacity-50"></i>
                        <p>Sé el primero en comentar este artículo</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px;">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3"><i class="fas fa-search me-2"></i>Buscar</h6>
                            <form action="{{ route('blog.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" 
                                           name="buscar" 
                                           class="form-control" 
                                           placeholder="Buscar artículos...">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3"><i class="fas fa-folder me-2"></i>Categorías</h6>
                            <div class="list-group list-group-flush">
                                <a href="{{ route('blog.index', ['categoria' => 'noticias']) }}" 
                                   class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-newspaper text-primary me-2"></i>Noticias
                                </a>
                                <a href="{{ route('blog.index', ['categoria' => 'consejos']) }}" 
                                   class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-lightbulb text-warning me-2"></i>Consejos
                                </a>
                                <a href="{{ route('blog.index', ['categoria' => 'proyectos']) }}" 
                                   class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-building text-info me-2"></i>Proyectos
                                </a>
                                <a href="{{ route('blog.index', ['categoria' => 'maquinaria']) }}" 
                                   class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-truck-monster text-success me-2"></i>Maquinaria
                                </a>
                                <a href="{{ route('blog.index', ['categoria' => 'seguridad']) }}" 
                                   class="list-group-item list-group-item-action border-0 px-0">
                                    <i class="fas fa-hard-hat text-danger me-2"></i>Seguridad
                                </a>
                            </div>
                        </div>
                    </div>

                    @if(isset($articulos_relacionados) && count($articulos_relacionados) > 0)
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3"><i class="fas fa-bookmark me-2"></i>Artículos Relacionados</h6>
                            @foreach($articulos_relacionados as $relacionado)
                            <a href="{{ route('blog.articulo', $relacionado->_id) }}" 
                               class="d-flex text-decoration-none mb-3 hover-scale">
                                @if(isset($relacionado->imagen_miniatura))
                                <img src="{{ asset('storage/blog/' . $relacionado->imagen_miniatura) }}" 
                                     alt="{{ $relacionado->titulo }}"
                                     class="rounded me-3"
                                     style="width: 60px; height: 60px; object-fit: cover;">
                                @endif
                                <div class="flex-grow-1">
                                    <p class="fw-bold text-dark mb-1 small">{{ Str::limit($relacionado->titulo, 50) }}</p>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ isset($relacionado->fecha_publicacion) ? \Carbon\Carbon::parse($relacionado->fecha_publicacion)->format('d/m/Y') : '' }}
                                    </small>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="card border-0 shadow-sm bg-primary text-white">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3"><i class="fas fa-envelope me-2"></i>Suscríbete</h6>
                            <p class="small mb-3">Recibe las últimas noticias y consejos sobre maquinaria pesada</p>
                            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="email" 
                                           name="email" 
                                           class="form-control" 
                                           placeholder="Tu email" 
                                           required>
                                </div>
                                <button type="submit" class="btn btn-light btn-sm w-100">Suscribirse</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>.blog-content{font-size:1.1rem;line-height:1.8;color:#333}.blog-content h2{font-size:1.75rem;font-weight:bold;margin-top:2rem;margin-bottom:1rem;color:#1565C0}.blog-content h3{font-size:1.5rem;font-weight:bold;margin-top:1.5rem;margin-bottom:0.75rem;color:#1565C0}.blog-content p{margin-bottom:1.25rem}.blog-content ul,.blog-content ol{margin-bottom:1.25rem;padding-left:2rem}.blog-content li{margin-bottom:0.5rem}.blog-content blockquote{border-left:4px solid #1565C0;padding-left:1.5rem;margin:1.5rem 0;font-style:italic;color:#666}.blog-content img{max-width:100%;height:auto;border-radius:8px;margin:1.5rem 0}.blog-content a{color:#1565C0;text-decoration:underline}.blog-content a:hover{color:#0D47A1}.hover-scale{transition:transform 0.3s ease}.hover-scale:hover{transform:translateY(-3px)}</style>
@endpush

@push('scripts')
<script>
function copiarUrl() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
        Swal.fire({
            icon: 'success',
            title: '¡Copiado!',
            text: 'URL copiada al portapapeles',
            timer: 2000,
            showConfirmButton: false
        });
    });
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>
@endpush