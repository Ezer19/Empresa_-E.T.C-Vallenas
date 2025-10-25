@extends('layouts.app')

@section('title', $servicio->nombre . ' - ETC Vallenas')
@section('description', $servicio->descripcion_corta ?? 'Servicio de ' . $servicio->nombre . ' en ETC Vallenas')

@section('content')
<section class="py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('servicios.index') }}">Servicios</a></li>
                <li class="breadcrumb-item active">{{ $servicio->nombre }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow mb-4 overflow-hidden">
                    @if($servicio->imagen)
                    <img src="{{ Storage::url('servicios/' . $servicio->imagen) }}" 
                         class="card-img-top" 
                         alt="{{ $servicio->nombre }}"
                         style="height: 400px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                         style="height: 400px;">
                        <i class="fas fa-tools fa-6x opacity-25"></i>
                    </div>
                    @endif
                </div>

                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold mb-3">
                            <i class="fas fa-info-circle text-primary me-2"></i>Descripción del Servicio
                        </h2>
                        @if($servicio->descripcion_corta)
                        <p class="lead text-muted mb-3">{{ $servicio->descripcion_corta }}</p>
                        @endif
                        @if($servicio->descripcion)
                        <div class="text-content">
                            {!! nl2br(e($servicio->descripcion)) !!}
                        </div>
                        @endif
                    </div>
                </div>

                @if($servicio->caracteristicas && count($servicio->caracteristicas) > 0)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h3 class="h4 fw-bold mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>Características Principales
                        </h3>
                        <div class="row g-3">
                            @foreach($servicio->caracteristicas as $caracteristica)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check text-success me-2 mt-1"></i>
                                    <span class="text-muted">{{ $caracteristica }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                
                @if($servicio->beneficios && count($servicio->beneficios) > 0)
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h3 class="h4 fw-bold mb-3">
                            <i class="fas fa-star text-warning me-2"></i>Beneficios
                        </h3>
                        <div class="row g-3">
                            @foreach($servicio->beneficios as $beneficio)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-star text-warning me-2 mt-1"></i>
                                    <span class="text-muted">{{ $beneficio }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
            <div class="col-lg-4">
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge bg-secondary">
                        {{ ucfirst(str_replace('_', ' ', $servicio->tipo)) }}
                    </span>
                    @if($servicio->destacado)
                    <span class="badge bg-primary">Destacado</span>
                    @endif
                </div>
                
                <h1 class="h2 fw-bold mb-4">{{ $servicio->nombre }}</h1>

                @if($servicio->precio_base)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body text-center p-4">
                        <h6 class="text-muted mb-2">Precio desde</h6>
                        <h2 class="text-primary fw-bold mb-2">
                            S/ {{ number_format($servicio->precio_base, 2) }}
                        </h2>
                        <small class="text-muted">*Precio base puede variar según especificaciones</small>
                    </div>
                </div>
                @endif

                <div class="d-grid gap-3 mb-4">
                    <a href="{{ route('contacto.index', ['servicio' => $servicio->id]) }}" 
                       class="btn btn-primary btn-lg py-3 fw-semibold">
                        <i class="fas fa-paper-plane me-2"></i>Solicitar Cotización
                    </a>
                    <a href="https://wa.me/51984123456?text=Hola, me interesa el servicio: {{ urlencode($servicio->nombre) }}" 
                       target="_blank" 
                       class="btn btn-success btn-lg py-3 fw-semibold">
                        <i class="fab fa-whatsapp me-2"></i>Consultar por WhatsApp
                    </a>
                </div>

                <div class="card border-0 bg-light">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-headset text-primary me-2"></i>¿Necesitas ayuda?
                        </h6>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-phone text-primary me-3"></i>
                            <a href="tel:+51984123456" class="text-decoration-none">+51 984 123 456</a>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-envelope text-primary me-3"></i>
                            <a href="mailto:vallenasfernando43@gmail.com" class="text-decoration-none">vallenasfernando43@gmail.com</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock text-primary me-3"></i>
                            <small class="text-muted">Lun - Sáb: 8:00 AM - 6:00 PM</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($servicio->faqs && count($servicio->faqs) > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Preguntas Frecuentes</h2>
            <p class="text-muted lead">Resolvemos tus dudas sobre este servicio</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion" id="faqAccordion">
                    @foreach($servicio->faqs as $index => $faq)
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h3 class="accordion-header">
                            <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }} fw-semibold" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#faq{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                {{ $faq['pregunta'] }}
                            </button>
                        </h3>
                        <div id="faq{{ $index }}" 
                             class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ $faq['respuesta'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($relacionados && $relacionados->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">Servicios Relacionados</h2>
            <p class="text-muted lead">Descubre otros servicios que podrían interesarte</p>
        </div>
        <div class="row g-4">
            @foreach($relacionados as $relacionado)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    @if($relacionado->imagen)
                    <img src="{{ Storage::url('servicios/' . $relacionado->imagen) }}" 
                         class="card-img-top" 
                         alt="{{ $relacionado->nombre }}"
                         style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                         style="height: 200px;">
                        <i class="fas fa-tools fa-3x opacity-25"></i>
                    </div>
                    @endif
                    <div class="card-body p-4">
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            <span class="badge bg-secondary">
                                {{ ucfirst(str_replace('_', ' ', $relacionado->tipo)) }}
                            </span>
                        </div>
                        <h5 class="card-title fw-bold mb-2">{{ $relacionado->nombre }}</h5>
                        @if($relacionado->descripcion_corta)
                        <p class="text-muted mb-3">
                            {{ Str::limit($relacionado->descripcion_corta, 100) }}
                        </p>
                        @endif
                        <a href="{{ route('servicios.show', $relacionado->id) }}" 
                           class="btn btn-outline-primary w-100">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="h1 fw-bold mb-3">¿Listo para comenzar tu proyecto?</h2>
        <p class="lead mb-4">Contáctanos hoy mismo y recibe una cotización personalizada sin compromiso</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                <i class="fas fa-envelope me-2"></i>Solicitar Cotización
            </a>
            <a href="{{ route('servicios.index') }}" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                <i class="fas fa-th me-2"></i>Ver Todos los Servicios
            </a>
        </div>
    </div>
</section>
@endsection