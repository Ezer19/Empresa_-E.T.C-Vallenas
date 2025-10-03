@extends('layouts.app')

@section('title', 'Nuestra Ubicación - ETC Vallenas')
@section('description', 'Encuéntranos en Cusco, Perú. Oficinas, almacenes y cómo llegar a ETC Vallenas.')

@section('content')
<!-- Header de Ubicación -->
<section class="py-5" style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%);">
    <div class="container">
        <div class="row justify-content-center text-center text-white">
            <div class="col-lg-8">
                <div class="mb-4">
                    <i class="fas fa-map-marked-alt fa-4x mb-3"></i>
                </div>
                <h1 class="display-4 fw-bold mb-3">Nuestra Ubicación</h1>
                <p class="lead mb-0">
                    Visítanos en nuestras instalaciones en el corazón de Cusco
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Mapa Interactivo -->
<section class="py-0">
    <div id="map" style="height: 500px; width: 100%;"></div>
</section>

<!-- Información de Ubicación -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row g-4">
            <!-- Oficina Principal -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-building text-primary fa-2x"></i>
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
            
            <!-- Almacén de Maquinaria -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-warehouse text-success fa-2x"></i>
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
            
            <!-- Centro de Servicio Técnico -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-tools text-warning fa-2x"></i>
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

<!-- Cómo Llegar -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">¿Cómo Llegar?</h2>
            <p class="text-muted">Te indicamos las mejores rutas para llegar a nuestras instalaciones</p>
        </div>
        
        <div class="row g-4">
            <!-- En Auto -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-car text-primary fa-3x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">En Auto</h5>
                        <p class="text-muted small mb-0">
                            Desde la Plaza de Armas de Cusco, toma la Av. La Cultura hacia el este. 
                            Estacionamiento gratuito disponible.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- En Transporte Público -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-bus text-success fa-3x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">En Bus</h5>
                        <p class="text-muted small mb-0">
                            Líneas que pasan cerca: A1, B2, C3. 
                            Paradero más cercano: "La Cultura - Huayruropata".
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- En Taxi -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-taxi text-warning fa-3x"></i>
                        </div>
                        <h5 class="fw-bold mb-3">En Taxi</h5>
                        <p class="text-muted small mb-0">
                            Desde el centro de Cusco aproximadamente S/15-20. 
                            Tiempo estimado: 15-20 minutos.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- A Pie -->
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-walking text-info fa-3x"></i>
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

<!-- Referencias Cercanas -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Referencias Cercanas</h2>
            <p class="text-muted">Puntos de referencia para ubicarnos fácilmente</p>
        </div>
        
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                                    <i class="fas fa-university text-primary fa-2x"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Universidad UNSAAC</h6>
                                    <small class="text-muted">A 2 cuadras de nuestra oficina</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-success bg-opacity-10 rounded p-3 me-3">
                                    <i class="fas fa-hospital text-success fa-2x"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Hospital Regional</h6>
                                    <small class="text-muted">A 5 minutos en auto</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-warning bg-opacity-10 rounded p-3 me-3">
                                    <i class="fas fa-shopping-cart text-warning fa-2x"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Centro Comercial Real Plaza</h6>
                                    <small class="text-muted">A 3 cuadras de distancia</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center">
                                <div class="bg-info bg-opacity-10 rounded p-3 me-3">
                                    <i class="fas fa-gas-pump text-info fa-2x"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Grifo Primax</h6>
                                    <small class="text-muted">Frente a nuestras instalaciones</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3">
                            <i class="fas fa-map-signs me-2 text-primary"></i>
                            Instrucciones Detalladas
                        </h4>
                        <ol class="mb-0">
                            <li class="mb-3">
                                <strong>Desde el Centro Histórico:</strong><br>
                                <small class="text-muted">
                                    Toma la Av. El Sol hasta llegar a la Av. La Cultura. 
                                    Gira a la derecha y continúa 1.5 km.
                                </small>
                            </li>
                            <li class="mb-3">
                                <strong>Desde el Aeropuerto:</strong><br>
                                <small class="text-muted">
                                    Toma un taxi o transfer. Tiempo aproximado: 25 minutos. 
                                    Costo aproximado: S/25-30.
                                </small>
                            </li>
                            <li class="mb-3">
                                <strong>Desde la Terminal Terrestre:</strong><br>
                                <small class="text-muted">
                                    Toma la Av. Pachacútec hasta la Av. La Cultura. 
                                    Gira a la izquierda. 15 minutos en taxi.
                                </small>
                            </li>
                            <li class="mb-0">
                                <strong>Estacionamiento:</strong><br>
                                <small class="text-muted">
                                    Contamos con estacionamiento gratuito para 20 vehículos. 
                                    Espacio para camiones y trailers disponible.
                                </small>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contacto Rápido -->
<section class="section-padding bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <h3 class="fw-bold mb-3">¿No encuentras la dirección?</h3>
                <p class="mb-0 opacity-75">
                    Llámanos y con gusto te ayudaremos a llegar a nuestras instalaciones. 
                    Estamos aquí para ayudarte.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="tel:+51984123456" class="btn btn-light btn-lg mb-2 me-2">
                    <i class="fas fa-phone me-2"></i>+51 984 123 456
                </a>
                <a href="https://wa.me/51984123456" target="_blank" class="btn btn-success btn-lg mb-2">
                    <i class="fab fa-whatsapp me-2"></i>WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
.leaflet-popup-content-wrapper {
    border-radius: 8px;
}
.leaflet-popup-content {
    margin: 15px;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
// Inicializar el mapa centrado en Cusco
const map = L.map('map').setView([-13.53195, -71.96746], 14);

// Añadir capa de OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors',
    maxZoom: 19
}).addTo(map);

// Icono personalizado para las ubicaciones
const iconOptions = {
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
};

const greenIcon = L.icon({
    ...iconOptions,
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png'
});

const yellowIcon = L.icon({
    ...iconOptions,
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png'
});

// Marcador: Oficina Principal
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

// Marcador: Almacén Principal
L.marker([-13.52500, -71.95000], {icon: greenIcon})
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

// Marcador: Centro de Servicio
L.marker([-13.53500, -71.97000], {icon: yellowIcon})
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

// Dibujar un círculo alrededor de la zona de cobertura
L.circle([-13.53195, -71.96746], {
    color: '#1565C0',
    fillColor: '#1565C0',
    fillOpacity: 0.1,
    radius: 3000
}).addTo(map).bindPopup('Zona de cobertura principal');
</script>
@endpush
