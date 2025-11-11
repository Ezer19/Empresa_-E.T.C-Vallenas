<!DOCTYPE html>
<html lang="es-PE">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ETC Vallenas - Alquiler de Maquinaria Pesada | Cusco, Perú')</title>

    <meta name="description" content="@yield('description', 'ETC Vallenas - Empresa líder en alquiler de maquinaria pesada en Cusco, Perú. Más de 15 años de experiencia y 85+ equipos disponibles.')">
    <meta name="keywords" content="@yield('keywords', 'alquiler maquinaria pesada, construcción, minería, Cusco, Perú, excavadoras, cargadores, volquetes')">
    <meta name="author" content="Ezer B. Zuniga Chura">

    <meta property="og:title" content="@yield('og_title', 'ETC Vallenas - Alquiler de Maquinaria Pesada')">
    <meta property="og:description" content="@yield('og_description', 'Empresa líder en alquiler de maquinaria pesada en Cusco, Perú.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/images/logo.svg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_PE">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'ETC Vallenas')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Alquiler de maquinaria pesada en Cusco')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('assets/images/logo.svg'))">

    <!-- Favicon: usamos el favicon por defecto en la raíz pública -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome ya se incluye vía Vite (@fortawesome/fontawesome-free) -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="d-flex flex-column h-100">
    @include('partials.header')

    <main id="main-content" class="flex-shrink-0">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
    <!-- SweetAlert2 para notificaciones -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    timer: 4000,
                    showConfirmButton: true
                });
            });
        </script>
    @endif
</body>

</html>
