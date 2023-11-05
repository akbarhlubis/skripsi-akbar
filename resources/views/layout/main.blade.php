<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Management System | UTI</title>
    <script defer src="https://unpkg.com/alpinejs@latest/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/add-to-calendar-button@2" async defer></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Debugging CSS with outline red
        * {
            outline: 1px solid red;
        }
        */
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dark:bg-slate-950 dark:text-white">
    @include('components.navbar')
    @include('sweetalert::alert')
    {{-- Ini untuk Komponen Navigasi --}}
    <div class="container mx-auto">
        {{-- Ini untuk isi dari container yang berisikan konten dari halamannya --}}
        @yield('container')
    </div>
    @include('components.footer')
    <a href="#" class="fixed bottom-0 right-0 z-50 invisible mb-24 mr-4 text-white fab md:mb-6">
        <i class="p-4 rounded-full bi bi-chevron-double-up bg-primary hover:bg-red-400"></i>
    </a>
</body>
</html>
