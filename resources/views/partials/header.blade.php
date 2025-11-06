<header class="sticky-top shadow-sm bg-white" style="z-index: 1030;">
    <div class="bg-gradient-primary text-white py-2 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone fa-sm me-2"></i>
                            <a href="tel:+51984123456" class="text-white text-decoration-none small">+51 984 123 456</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope fa-sm me-2"></i>
                            <a href="mailto:vallenasfernando43@gmail.com"
                                class="text-white text-decoration-none small">vallenasfernando43@gmail.com</a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-map-marker-alt fa-sm me-2"></i>
                            <span class="small">Cusco, Perú</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex justify-content-lg-end align-items-center gap-3">
                        <a href="https://www.facebook.com/etcvallenas" class="text-white text-decoration-none"
                            target="_blank" aria-label="Facebook">
                            <i class="fab fa-facebook-f fa-sm"></i>
                        </a>
                        <a href="https://www.instagram.com/etcvallenas" class="text-white text-decoration-none"
                            target="_blank" aria-label="Instagram">
                            <i class="fab fa-instagram fa-sm"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/etcvallenas" class="text-white text-decoration-none"
                            target="_blank" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in fa-sm"></i>
                        </a>
                        <a href="https://wa.me/51984123456" class="text-white text-decoration-none" target="_blank"
                            aria-label="WhatsApp">
                            <i class="fab fa-whatsapp fa-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand navbar-light py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" aria-label="ETC Vallenas">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="ETC Vallenas" height="55" class="img-fluid">
                <span class="ms-2 fw-bold text-primary d-none d-md-block">ETC Vallenas</span>
            </a>

            <!-- Menú siempre visible: sin colapso ni toggler -->
            <div class="navbar-collapse d-flex" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('home') ? 'active bg-primary text-white' : '' }}"
                            href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link fw-semibold px-3 py-2 rounded-3 dropdown-toggle {{ request()->routeIs('empresa.*') ? 'active bg-primary text-white' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-building me-1"></i>Empresa
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg">
                            <li><a class="dropdown-item py-2" href="{{ route('empresa.index') }}">Sobre Nosotros</a>
                            </li>
                            <li><a class="dropdown-item py-2" href="{{ route('empresa.historia') }}">Historia</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('empresa.valores') }}">Misión y Valores</a>
                            </li>
                            <li><a class="dropdown-item py-2"
                                    href="{{ route('empresa.certificaciones') }}">Certificaciones</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('servicios.*') ? 'active bg-primary text-white' : '' }}"
                            href="{{ route('servicios.index') }}">
                            <i class="fas fa-cogs me-1"></i>Servicios
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('maquinaria.*') ? 'active bg-primary text-white' : '' }}"
                            href="{{ route('maquinaria.index') }}">
                            <i class="fas fa-truck-monster me-1"></i>Maquinaria
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('proyectos.*') ? 'active bg-primary text-white' : '' }}"
                            href="{{ route('proyectos.index') }}">
                            <i class="fas fa-project-diagram me-1"></i>Proyectos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('blog.*') ? 'active bg-primary text-white' : '' }}"
                            href="{{ route('blog.index') }}">
                            <i class="fas fa-newspaper me-1"></i>Blog
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3 py-2 rounded-3 {{ request()->routeIs('contacto.*') ? 'active bg-primary text-white' : '' }}"
                            href="{{ route('contacto.index') }}">
                            <i class="fas fa-envelope me-1"></i>Contacto
                        </a>
                    </li>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link fw-semibold px-3 py-2 rounded-3 dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ Auth::user()->avatar_url ?? asset('assets/images/default-avatar.png') }}"
                                    alt="Avatar" class="rounded-circle me-2" width="30" height="30">
                                {{ Auth::user()->nombre }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg">
                                <li><a class="dropdown-item py-2" href="{{ route('usuario.dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                    </a></li>
                                <li><a class="dropdown-item py-2" href="{{ route('usuario.perfil') }}">
                                        <i class="fas fa-user me-2"></i>Mi Perfil
                                    </a></li>
                                @if (Auth::user()->rol === 'admin')
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item py-2" href="{{ route('admin.index') }}">
                                            <i class="fas fa-shield-alt me-2"></i>Panel Admin
                                        </a></li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item py-2 text-danger border-0 bg-transparent w-100 text-start">
                                            <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-primary px-3 py-2 fw-semibold ms-lg-2" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Ingresar
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
