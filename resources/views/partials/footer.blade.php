<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row g-4">
            <!-- Información de la Empresa -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/images/logo2.png') }}" alt="ETC Vallenas" height="40" class="me-2">
                    <h5 class="mb-0">ETC Vallenas</h5>
                </div>
                <p class="text-white-50">
                    Empresa líder en alquiler de maquinaria pesada en Cusco, Perú. 
                    Más de 15 años brindando soluciones para construcción y minería.
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="https://facebook.com/etcvallenas" target="_blank" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://instagram.com/etcvallenas" target="_blank" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com/company/etcvallenas" target="_blank" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://wa.me/51984123456" target="_blank" class="btn btn-outline-light btn-sm">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Enlaces Rápidos -->
            <div class="col-lg-2 col-md-6">
                <h5 class="mb-3">Enlaces</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('empresa.index') }}" class="text-white-50 text-decoration-none hover-primary">Sobre Nosotros</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}" class="text-white-50 text-decoration-none hover-primary">Servicios</a></li>
                    <li class="mb-2"><a href="{{ route('maquinaria.index') }}" class="text-white-50 text-decoration-none hover-primary">Maquinaria</a></li>
                    <li class="mb-2"><a href="{{ route('proyectos.index') }}" class="text-white-50 text-decoration-none hover-primary">Proyectos</a></li>
                    <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-white-50 text-decoration-none hover-primary">Blog</a></li>
                </ul>
            </div>

            <!-- Servicios -->
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Servicios</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=alquiler" class="text-white-50 text-decoration-none hover-primary">Alquiler de Maquinaria</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=mantenimiento" class="text-white-50 text-decoration-none hover-primary">Mantenimiento</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=construccion" class="text-white-50 text-decoration-none hover-primary">Construcción</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=transporte" class="text-white-50 text-decoration-none hover-primary">Transporte</a></li>
                    <li class="mb-2"><a href="{{ route('servicios.index') }}?tipo=consultoria" class="text-white-50 text-decoration-none hover-primary">Consultoría</a></li>
                </ul>
            </div>

            <!-- Contacto -->
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Contacto</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                        <span class="text-white-50">Cusco, Perú</span>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone me-2 text-primary"></i>
                        <a href="tel:+51984123456" class="text-white-50 text-decoration-none">+51 984 123 456</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2 text-primary"></i>
                        <a href="mailto:vallenasfernando43@gmail.com" class="text-white-50 text-decoration-none">vallenasfernando43@gmail.com</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-clock me-2 text-primary"></i>
                        <span class="text-white-50">Lun - Vie: 8:00 AM - 6:00 PM</span>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-clock me-2 text-primary"></i>
                        <span class="text-white-50">Sáb: 9:00 AM - 1:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <hr class="my-4 bg-secondary">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 text-white-50">
                    &copy; {{ date('Y') }} ETC Vallenas. Todos los derechos reservados.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0 text-white-50">
                    Desarrollado por 
                    <a href="https://instagram.com/ezerzuniga.oficial16" target="_blank" class="text-primary text-decoration-none">
                        Ezer B. Zuñiga Chura
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
.hover-primary:hover {
    color: #1565C0 !important;
    transition: color 0.3s ease;
}
</style>
