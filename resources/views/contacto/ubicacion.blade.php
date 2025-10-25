@extends('layouts.app')

@section('title', 'Nuestra Ubicación - ETC Vallenas')
@section('description', 'Encuéntranos en Cusco, Perú. Oficinas, almacenes y cómo llegar a ETC Vallenas.')

@section('content')
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <i class="fas fa-map-marked-alt fa-4x mb-3"></i>
                </div>
                <h1 class="display-5 fw-bold mb-3">Nuestra Ubicación</h1>
                <p class="lead mb-0">Visítanos en nuestras instalaciones en el corazón de Cusco</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div id="map" style="height: 500px; width: 100%;"></div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Oficina Principal</h4>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Dirección
                            </h6>
                            <p class="mb-0">Av. La Cultura 1234<br>Cusco, Perú</p>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-2">
                                <i class="fas fa-clock me-2"></i>Horario
                            </h6>
                            <p class="mb-1"><strong>Lun - Vie:</strong> 8:00 AM - 6:00 PM</p>
                            <p class="mb-1"><strong>Sábados:</strong> 8:00 AM - 2:00 PM</p>
                            <p class="mb-0"><strong>Domingos:</strong> Cerrado</p>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-2">
                                <i class="fas fa-phone me-2"></i>Contacto
                            </h6>
                            <p class="mb-1">
                                <a href="tel:+51984123456" class="text-decoration-none">+51 984 123 456</a>
                            </p>
                            <p class="mb-0">
                                <a href="mailto:vallenasfernando43@gmail.com" class="text-decoration-none">
                                    vallenasfernando43@gmail.com
                                </a>
                            </p>
                        </div>
                        
                        <a href="https://www.google.com/maps/dir/?api=1&destination=-13.53195,-71.96746" 
                           target="_blank" 
                           class="btn btn-primary w-100">
                            <i class="fas fa-directions me-2"></i>Cómo Llegar
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-warehouse fa-2x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Almacén Principal</h4>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-success mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Dirección
                            </h6>
                            <p class="mb-0">Av. Industrial 567<br>Parque Industrial, Cusco</p>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-success mb-2">
                                <i class="fas fa-clock me-2"></i>Horario
                            </h6>
                            <p class="mb-1"><strong>Lun - Sáb:</strong> 7:00 AM - 7:00 PM</p>
                            <p class="mb-0"><strong>Domingos:</strong> Solo emergencias</p>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-success mb-2">
                                <i class="fas fa-info-circle me-2"></i>Servicios
                            </h6>
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-check text-success me-2"></i>Recojo de maquinaria</li>
                                <li><i class="fas fa-check text-success me-2"></i>Mantenimiento</li>
                                <li><i class="fas fa-check text-success me-2"></i>Inspección técnica</li>
                            </ul>
                        </div>
                        
                        <a href="https://www.google.com/maps/dir/?api=1&destination=-13.52500,-71.95000" 
                           target="_blank" 
                           class="btn btn-success w-100">
                            <i class="fas fa-directions me-2"></i>Cómo Llegar
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow h-100 transition-all">
                    <div class="card-body p-4">
                        <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-tools fa-2x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Centro de Servicio</h4>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-warning mb-2">
                                <i class="fas fa-map-marker-alt me-2"></i>Dirección
                            </h6>
                            <p class="mb-0">Av. Los Incas 890<br>Cusco, Perú</p>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-warning mb-2">
                                <i class="fas fa-clock me-2"></i>Horario
                            </h6>
                            <p class="mb-1"><strong>Lun - Vie:</strong> 7:00 AM - 7:00 PM</p>
                            <p class="mb-1"><strong>Sábados:</strong> 8:00 AM - 2:00 PM</p>
                            <p class="mb-0"><strong>Emergencias:</strong> 24/7</p>
                        </div>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-warning mb-2">
                                <i class="fas fa-wrench me-2"></i>Servicios
                            </h6>
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-check text-warning me-2"></i>Reparaciones</li>
                                <li><i class="fas fa-check text-warning me-2"></i>Mantenimiento preventivo</li>
                                <li><i class="fas fa-check text-warning me-2"></i>Repuestos</li>
                            </ul>
                        </div>
                        
                        <a href="https://www.google.com/maps/dir/?api=1&destination=-13.53500,-71.97000" 
                           target="_blank" 
                           class="btn btn-warning w-100">
                            <i class="fas fa-directions me-2"></i>Cómo Llegar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1 fw-bold mb-3">¿Cómo Llegar?</h2>
            <p class="text-muted lead">Te indicamos las mejores rutas para llegar a nuestras instalaciones</p>
        </div>
        
        <div class="row g-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-car fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">En Auto</h5>
                        <p class="text-muted small mb-0">
                            Desde la Plaza de Armas de Cusco, toma la Av. La Cultura hacia el este. 
                            Estacionamiento gratuito disponible.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-bus fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">En Bus</h5>
                        <p class="text-muted small mb-0">
                            Líneas que pasan cerca: A1, B2, C3. 
                            Paradero más cercano: "La Cultura - Huayruropata".
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-taxi fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">En Taxi</h5>
                        <p class="text-muted small mb-0">
                            Desde el centro de Cusco aproximadamente S/15-20. 
                            Tiempo estimado: 15-20 minutos.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-walking fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Caminando</h5>
                        <p class="text-muted small mb-0">
                            Desde la Universidad Nacional de San Antonio Abad: 
                            10 minutos a pie.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="h2 fw-bold mb-3">¿No encuentras la dirección?</h3>
                <p class="lead mb-0 opacity-75">
                    Llámanos y con gusto te ayudaremos a llegar a nuestras instalaciones. 
                    Estamos aquí para ayudarte.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="tel:+51984123456" class="btn btn-light btn-lg px-4 py-3 fw-semibold me-2 mb-2">
                    <i class="fas fa-phone me-2"></i>+51 984 123 456
                </a>
                <a href="https://wa.me/51984123456" target="_blank" class="btn btn-success btn-lg px-4 py-3 fw-semibold mb-2">
                    <i class="fab fa-whatsapp me-2"></i>WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
const map = L.map('map').setView([-13.53195, -71.96746], 14);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 19
}).addTo(map);

L.marker([-13.53195, -71.96746])
    .addTo(map)
    .bindPopup(`
        <div class="text-center">
            <h6 class="fw-bold mb-2">Oficina Principal</h6>
            <p class="small mb-2">Av. La Cultura 1234<br>Cusco, Perú</p>
            <a href="https://www.google.com/maps/dir/?api=1&destination=-13.53195,-71.96746" 
               target="_blank" 
               class="btn btn-sm btn-primary">
                Cómo Llegar
            </a>
        </div>
    `);

L.marker([-13.52500, -71.95000])
    .addTo(map)
    .bindPopup(`
        <div class="text-center">
            <h6 class="fw-bold mb-2">Almacén Principal</h6>
            <p class="small mb-2">Av. Industrial 567<br>Parque Industrial, Cusco</p>
            <a href="https://www.google.com/maps/dir/?api=1&destination=-13.52500,-71.95000" 
               target="_blank" 
               class="btn btn-sm btn-success">
                Cómo Llegar
            </a>
        </div>
    `);

L.marker([-13.53500, -71.97000])
    .addTo(map)
    .bindPopup(`
        <div class="text-center">
            <h6 class="fw-bold mb-2">Centro de Servicio</h6>
            <p class="small mb-2">Av. Los Incas 890<br>Cusco, Perú</p>
            <a href="https://www.google.com/maps/dir/?api=1&destination=-13.53500,-71.97000" 
               target="_blank" 
               class="btn btn-sm btn-warning">
                Cómo Llegar
            </a>
        </div>
    `);
</script>
@endpush