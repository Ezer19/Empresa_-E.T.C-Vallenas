@extends('layouts.app')

@section('title', 'Cerrar Sesión')

@section('content')
<!-- Sección de Cierre de Sesión -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5 text-center">
                        <!-- Icono de Logout -->
                        <div class="mb-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-sign-out-alt text-warning fa-3x"></i>
                            </div>
                        </div>

                        <h2 class="h4 fw-bold mb-3">¿Cerrar Sesión?</h2>
                        <p class="text-muted mb-4">
                            ¿Estás seguro de que deseas cerrar tu sesión en ETC Vallenas?
                        </p>

                        <!-- Información del Usuario -->
                        @auth
                        <div class="alert alert-light border mb-4">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 40px; height: 40px;">
                                    <i class="fas fa-user text-primary"></i>
                                </div>
                                <div class="text-start">
                                    <strong class="d-block">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</strong>
                                    <small class="text-muted">{{ Auth::user()->email }}</small>
                                </div>
                            </div>
                        </div>
                        @endauth

                        <!-- Formulario de Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="mb-3">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-lg w-100 mb-2">
                                <i class="fas fa-sign-out-alt me-2"></i>Sí, Cerrar Sesión
                            </button>
                        </form>

                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>

                        <hr class="my-4">

                        <!-- Información Adicional -->
                        <div class="text-start">
                            <p class="small text-muted mb-2">
                                <i class="fas fa-info-circle me-2"></i>
                                Al cerrar sesión:
                            </p>
                            <ul class="small text-muted text-start ps-4">
                                <li>Se cerrará tu sesión actual de forma segura</li>
                                <li>Deberás iniciar sesión nuevamente para acceder</li>
                                <li>Tus datos permanecerán seguros</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Enlaces Rápidos -->
                <div class="text-center mt-4">
                    <p class="text-muted small mb-2">
                        <i class="fas fa-shield-alt me-2"></i>
                        Tu información está protegida y segura
                    </p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="{{ route('home') }}" class="text-decoration-none small">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                        <a href="{{ route('contacto.index') }}" class="text-decoration-none small">
                            <i class="fas fa-envelope me-1"></i>Contacto
                        </a>
                        <a href="{{ route('contacto.soporte') }}" class="text-decoration-none small">
                            <i class="fas fa-headset me-1"></i>Soporte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección de Información -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-4">
                    <!-- Seguridad -->
                    <div class="col-md-4 text-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-lock text-primary fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Seguridad</h5>
                        <p class="text-muted small mb-0">
                            Tus datos están protegidos con encriptación de última generación
                        </p>
                    </div>

                    <!-- Soporte 24/7 -->
                    <div class="col-md-4 text-center">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-headset text-success fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Soporte 24/7</h5>
                        <p class="text-muted small mb-0">
                            Estamos disponibles para ayudarte en cualquier momento
                        </p>
                    </div>

                    <!-- Confianza -->
                    <div class="col-md-4 text-center">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 60px; height: 60px;">
                            <i class="fas fa-certificate text-warning fa-2x"></i>
                        </div>
                        <h5 class="fw-bold mb-2">15+ Años</h5>
                        <p class="text-muted small mb-0">
                            De experiencia brindando servicios de calidad en Cusco
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Confirmación adicional al cerrar sesión
document.querySelector('form[action="{{ route("logout") }}"]')?.addEventListener('submit', function(e) {
    // Opcional: Agregar lógica adicional antes del logout
    console.log('Cerrando sesión...');
});

// Auto-redirigir si no hay usuario autenticado
@guest
    window.location.href = "{{ route('login') }}";
@endguest
</script>
@endpush
