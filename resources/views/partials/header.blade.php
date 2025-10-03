<header class="position-sticky top-0 shadow-sm" style="z-index: 1000; background: white;">
    <!-- Top Bar -->
    <div class="top-bar text-white py-2" style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex gap-4 flex-wrap">
                        <a href="tel:+51984123456" class="text-white text-decoration-none">
                            <i class="fas fa-phone me-2"></i>+51 984 123 456
                        </a>
                        <a href="mailto:vallenasfernando43@gmail.com" class="text-white text-decoration-none">
                            <i class="fas fa-envelope me-2"></i>vallenasfernando43@gmail.com
                        </a>
                    </div>
                </div>
                <div class="col-md-6 text-md-end mt-2 mt-md-0">
                    <div class="d-flex gap-3 justify-content-md-end justify-content-start">
                        <a href="https://facebook.com/etcvallenas" target="_blank" class="text-white">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://instagram.com/etcvallenas" target="_blank" class="text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://linkedin.com/company/etcvallenas" target="_blank" class="text-white">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://wa.me/51984123456" target="_blank" class="text-white">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="ETC Vallenas Logo" height="50">
                <span class="ms-2 fw-bold" style="color: #1565C0;">ETC Vallenas</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                    </li>
                    
                    <!-- Dropdown Empresa -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('empresa*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-building me-1"></i>Empresa
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('empresa.index') }}">Sobre Nosotros</a></li>
                            <li><a class="dropdown-item" href="{{ route('empresa.historia') }}">Historia</a></li>
                            <li><a class="dropdown-item" href="{{ route('empresa.valores') }}">Misión y Valores</a></li>
                            <li><a class="dropdown-item" href="{{ route('empresa.certificaciones') }}">Certificaciones</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('servicios*') ? 'active' : '' }}" href="{{ route('servicios.index') }}">
                            <i class="fas fa-cogs me-1"></i>Servicios
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('maquinaria*') ? 'active' : '' }}" href="{{ route('maquinaria.index') }}">
                            <i class="fas fa-truck-monster me-1"></i>Maquinaria
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('proyectos*') ? 'active' : '' }}" href="{{ route('proyectos.index') }}">
                            <i class="fas fa-project-diagram me-1"></i>Proyectos
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}" href="{{ route('blog.index') }}">
                            <i class="fas fa-newspaper me-1"></i>Blog
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contacto*') ? 'active' : '' }}" href="{{ route('contacto.index') }}">
                            <i class="fas fa-envelope me-1"></i>Contacto
                        </a>
                    </li>
                    
                    @auth
                        <!-- Usuario autenticado -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="rounded-circle me-1" width="30" height="30">
                                {{ auth()->user()->nombre }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('usuario.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('usuario.perfil') }}">
                                    <i class="fas fa-user me-2"></i>Mi Perfil
                                </a></li>
                                @if(auth()->user()->isAdmin())
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">
                                        <i class="fas fa-shield-alt me-2"></i>Panel Admin
                                    </a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- Usuario no autenticado -->
                        <li class="nav-item">
                            <a class="btn btn-primary ms-lg-2" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Ingresar
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
