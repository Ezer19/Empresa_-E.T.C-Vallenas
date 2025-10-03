<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ETC Vallenas - Alquiler de Maquinaria Pesada')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'ETC Vallenas - Empresa líder en alquiler de maquinaria pesada en Cusco, Perú. Más de 15 años de experiencia y 85+ equipos disponibles.')">
    <meta name="keywords" content="@yield('keywords', 'alquiler maquinaria pesada, construcción, minería, Cusco, Perú, excavadoras, cargadores, volquetes')">
    <meta name="author" content="ETC Vallenas">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'ETC Vallenas - Alquiler de Maquinaria Pesada')">
    <meta property="og:description" content="@yield('og_description', 'Empresa líder en alquiler de maquinaria pesada en Cusco, Perú.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/images/logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'ETC Vallenas')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Alquiler de maquinaria pesada en Cusco')">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon (1).ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/icons/icons8-excavadora-de-oruga-16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/icons/icons8-excavadora-de-oruga-32.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body>
    <!-- Header -->
    @include('partials.header')
    
    <!-- Main Content -->
    <main id="main-content">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')
    
    <!-- Scripts -->
    @stack('scripts')
    
    <!-- Toast Notifications -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session("success") }}',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
    @endif
    
    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session("error") }}',
                timer: 3000,
                showConfirmButton: false
            });
        });
    </script>
    @endif
</body>
</html>
