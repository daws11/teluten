<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Page Title')</title> <!-- Default title jika section 'title' tidak didefinisikan -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tenant.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    
    
    @stack('head') <!-- Untuk memungkinkan view anak menambahkan script atau style tambahan di head -->
</head>
<body>
     <!-- Sertakan Top Navbar -->
    @include('components.navbar')
    @include('sidebar') <!-- Memastikan bahwa file sidebar.blade.php ada dan benar -->

    <div class="main-content">
        @yield('content') <!-- Tempat untuk isi konten dari view anak -->
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/home.js') }}" defer></script>
    <script type="module" src="{{ asset('js/app.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @stack('scripts') <!-- Tempat untuk view anak menambahkan script tambahan -->
    
</body>
</html>
