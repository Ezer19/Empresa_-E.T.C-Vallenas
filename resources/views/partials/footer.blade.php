<footer class="bg-dark text-white pt-5 pb-4" style="border-top: 4px solid var(--brand-orange);">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="ETC Vallenas" height="45" class="me-3">
                    <h5 class="mb-0 fw-bold">ETC Vallenas</h5>
                </div>
                <p class="text-white-50 mb-3">
                    Empresa líder en alquiler de maquinaria pesada en Cusco, Perú.
                    Más de 15 años brindando soluciones para construcción y minería.
                </p>
                <div class="d-flex gap-2">
                    <a href="https://facebook.com/etcvallenas" target="_blank"
                        class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://instagram.com/etcvallenas" target="_blank"
                        class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com/company/etcvallenas" target="_blank"
                        class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/51984123456" target="_blank"
                        class="btn btn-outline-light btn-sm rounded-circle">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="col-xl-2 col-md-6">
                <h5 class="fw-bold mb-3">Enlaces</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('empresa.index') }}"
                            class="text-white-50 text-decoration-none transition-all">Sobre Nosotros</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}"
                            class="text-white-50 text-decoration-none transition-all">Servicios</a></li>
                    <li class="mb-2"><a href="{{ route('maquinaria.index') }}"
                            class="text-white-50 text-decoration-none transition-all">Maquinaria</a></li>
                    <li class="mb-2"><a href="{{ route('proyectos.index') }}"
                            class="text-white-50 text-decoration-none transition-all">Proyectos</a></li>
                    <li class="mb-2"><a href="{{ route('blog.index') }}"
                            class="text-white-50 text-decoration-none transition-all">Blog</a></li>
                </ul>
            </div>

            <div class="col-xl-3 col-md-6">
                <h5 class="fw-bold mb-3">Servicios</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=alquiler"
                            class="text-white-50 text-decoration-none transition-all">Alquiler de Maquinaria</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=mantenimiento"
                            class="text-white-50 text-decoration-none transition-all">Mantenimiento</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=construccion"
                            class="text-white-50 text-decoration-none transition-all">Construcción</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=transporte"
                            class="text-white-50 text-decoration-none transition-all">Transporte</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=consultoria"
                            class="text-white-50 text-decoration-none transition-all">Consultoría</a></li>
                </ul>
            </div>

            <div class="col-xl-3 col-md-6">
                <h5 class="fw-bold mb-3">Contacto</h5>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-map-marker-alt mt-1 me-3 text-primary"></i>
                        <span class="text-white-50">Cusco, Perú</span>
                    </div>
                    <div class="d-flex align-items-start">
                        <i class="fas fa-phone mt-1 me-3 text-primary"></i>
                        <a href="tel:+51984123456" class="text-white-50 text-decoration-none transition-all">+51 984 123
                            456</a>
                    </div>
                    <div class="d-flex align-items-start">
                        <i class="fas fa-envelope mt-1 me-3 text-primary"></i>
                        <a href="mailto:vallenasfernando43@gmail.com"
                            class="text-white-50 text-decoration-none transition-all">vallenasfernando43@gmail.com</a>
                    </div>
                    <div class="d-flex align-items-start">
                        <i class="fas fa-clock mt-1 me-3 text-primary"></i>
                        <div>
                            <div class="text-white-50">Lun - Vie: 8:00 AM - 6:00 PM</div>
                            <div class="text-white-50 small">Sáb: 9:00 AM - 1:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-4" style="border-color: rgba(255,255,255,.12)">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <p class="mb-0 text-white-50">
                    &copy; {{ date('Y') }} ETC Vallenas. Todos los derechos reservados.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0 text-white-50">
                    Desarrollado por
                    <a href="https://instagram.com/ezerzuniga.oficial16" target="_blank"
                        class="text-decoration-none fw-semibold" style="color: var(--brand-orange)">
                        Ezer Zuñiga
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    .transition-all {
        transition: all 0.3s ease
    }

    .transition-all:hover {
        color: var(--brand-orange) !important;
        transform: translateX(5px)
    }

    .btn-outline-light.rounded-circle {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center
    }

    .btn-outline-light.rounded-circle:hover {
        background-color: var(--brand-orange);
        border-color: var(--brand-orange);
        transform: translateY(-2px)
    }
</style>
