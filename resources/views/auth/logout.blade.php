@extends('layouts.app')

@section('title', 'Cerrar Sesión - ETC Vallenas')

@section('content')
<section class="min-vh-100 d-flex align-items-center justify-content-center py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5 text-center">
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

                        <form method="POST" action="{{ route('logout') }}" class="mb-3" id="logoutForm">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-lg w-100 mb-2">
                                <i class="fas fa-sign-out-alt me-2"></i>Sí, Cerrar Sesión
                            </button>
                        </form>

                        <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('home') }}" 
                           class="btn btn-outline-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>

                        <hr class="my-4">

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
                        <a href="{{ route('soporte') }}" class="text-decoration-none small">
                            <i class="fas fa-headset me-1"></i>Soporte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@guest
<script>
    window.location.href = "{{ route('login') }}";
</script>
@endguest

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const logoutForm = document.getElementById('logoutForm');
    const cancelBtn = document.querySelector('a[href*="{{ route("home") }}"]');
    
    logoutForm?.addEventListener('submit', function(e) {
        const btn = this.querySelector('button[type="submit"]');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Cerrando sesión...';
        btn.disabled = true;
    });
    
    cancelBtn?.addEventListener('click', function(e) {
        e.preventDefault();
        window.history.length > 1 
            ? window.history.back() 
            : window.location.href = "{{ route('home') }}";
    });
});
</script>
@endpush
@endsection