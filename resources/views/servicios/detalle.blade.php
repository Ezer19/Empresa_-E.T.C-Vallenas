@extends('layouts.app')

@section('title', $servicio->nombre . ' - ETC Vallenas')
@section('description', $servicio->descripcion_corta ?? 'Servicio de ' . $servicio->nombre . ' en ETC Vallenas')

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('servicios.index') }}">Servicios</a></li>
                <li class="breadcrumb-item active">{{ $servicio->nombre }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Detalles del Servicio -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Imagen y Descripción -->
            <div class="col-lg-8">
                <!-- Imagen Principal -->
                <div class="card border-0 shadow mb-4">
                    @if($servicio->imagen)
                    <img src="{{ asset('storage/servicios/' . $servicio->imagen) }}" 
                         class="card-img-top" 
                         alt="{{ $servicio->nombre }}"
                         style="height: 400px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                         style="height: 400px;">
                        <i class="fas fa-tools" style="font-size: 8rem; opacity: 0.3;"></i>
                    </div>
                    @endif
                </div>
                
                <!-- Descripción -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-info-circle me-2"></i>Descripción del Servicio
                        </h5>
                        @if($servicio->descripcion_corta)
                        <p class="lead mb-3">{{ $servicio->descripcion_corta }}</p>
                        @endif
                        @if($servicio->descripcion)
                        <p class="mb-0">{{ $servicio->descripcion }}</p>
                        @endif
                    </div>
                </div>
                
                <!-- Características -->
                @if($servicio->caracteristicas && count($servicio->caracteristicas) > 0)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-check-circle me-2"></i>Características
                        </h5>
                        <div class="row g-3">
                            @foreach($servicio->caracteristicas as $caracteristica)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-check text-success me-2 mt-1"></i>
                                    <span>{{ $caracteristica }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                
                <!-- Beneficios -->
                @if($servicio->beneficios && count($servicio->beneficios) > 0)
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="fas fa-star me-2"></i>Beneficios
                        </h5>
                        <div class="row g-3">
                            @foreach($servicio->beneficios as $beneficio)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-star text-warning me-2 mt-1"></i>
                                    <span>{{ $beneficio }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Título y Tipo -->
                <div class="mb-3">
                    <span class="badge bg-secondary mb-2">
                        {{ ucfirst(str_replace('_', ' ', $servicio->tipo)) }}
                    </span>
                    @if($servicio->destacado)
                    <span class="badge bg-primary mb-2">Destacado</span>
                    @endif
                </div>
                
                <h1 class="display-6 fw-bold mb-4">{{ $servicio->nombre }}</h1>
                
                <!-- Precio -->
                @if($servicio->precio_base)
                <div class="card border-0 shadow mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted mb-2">Precio desde</h6>
                        <h2 class="text-primary fw-bold mb-0">
                            S/ {{ number_format($servicio->precio_base, 2) }}
                        </h2>
                        <small class="text-muted">*Precios pueden variar según especificaciones</small>
                    </div>
                </div>
                @endif
                
                <!-- Botones de Acción -->
                <div class="d-grid gap-2 mb-4">
                    <a href="{{ route('contacto.index', ['servicio' => $servicio->_id]) }}" 
                       class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane me-2"></i>Solicitar Cotización
                    </a>
                    <a href="https://wa.me/51984123456?text=Hola, me interesa el servicio de {{ $servicio->nombre }}" 
                       target="_blank" 
                       class="btn btn-success btn-lg">
                        <i class="fab fa-whatsapp me-2"></i>Consultar por WhatsApp
                    </a>
                </div>
                
                <!-- Información de Contacto -->
                <div class="card border-0 bg-light">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            <i class="fas fa-headset me-2"></i>¿Necesitas más información?
                        </h6>
                        <p class="mb-2">
                            <i class="fas fa-phone text-primary me-2"></i>
                            <a href="tel:+51984123456">+51 984 123 456</a>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <a href="mailto:vallenasfernando43@gmail.com">vallenasfernando43@gmail.com</a>
                        </p>
                        <p class="mb-0 small text-muted">
                            <i class="fas fa-clock me-2"></i>
                            Lun - Sáb: 8:00 AM - 6:00 PM
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Preguntas Frecuentes -->
@if($servicio->faqs && count($servicio->faqs) > 0)
<section class="section-padding bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Preguntas Frecuentes</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqsAccordion">
                    @foreach($servicio->faqs as $index => $faq)
                    <div class="accordion-item border-0 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#faq{{ $index }}">
                                {{ $faq['pregunta'] }}
                            </button>
                        </h2>
                        <div id="faq{{ $index }}" 
                             class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                             data-bs-parent="#faqsAccordion">
                            <div class="accordion-body">
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

<!-- Servicios Relacionados -->
@if($relacionados && $relacionados->count() > 0)
<section class="section-padding">
    <div class="container">
        <h2 class="section-title text-center mb-5">Servicios Relacionados</h2>
        <div class="row g-4">
            @foreach($relacionados as $relacionado)
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow h-100 hover-scale">
                    @if($relacionado->imagen)
                    <img src="{{ asset('storage/servicios/' . $relacionado->imagen) }}" 
                         class="card-img-top" 
                         alt="{{ $relacionado->nombre }}"
                         style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-primary text-white d-flex align-items-center justify-content-center" 
                         style="height: 200px;">
                        <i class="fas fa-tools" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">
                            {{ ucfirst(str_replace('_', ' ', $relacionado->tipo)) }}
                        </span>
                        <h6 class="card-title fw-bold mb-2">{{ $relacionado->nombre }}</h6>
                        @if($relacionado->descripcion_corta)
                        <p class="text-muted small mb-3">
                            {{ Str::limit($relacionado->descripcion_corta, 80) }}
                        </p>
                        @endif
                        <a href="{{ route('servicios.show', $relacionado->_id) }}" 
                           class="btn btn-sm btn-outline-primary w-100">
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

<!-- Call to Action -->
<section class="section-padding bg-primary text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">¿Listo para empezar?</h2>
        <p class="lead mb-4">Solicita una cotización gratuita y sin compromiso</p>
        <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg me-2">
            <i class="fas fa-envelope me-2"></i>Solicitar Cotización
        </a>
        <a href="{{ route('servicios.index') }}" class="btn btn-outline-light btn-lg">
            <i class="fas fa-th me-2"></i>Ver Todos los Servicios
        </a>
    </div>
</section>
@endsection
