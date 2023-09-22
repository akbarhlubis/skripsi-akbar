<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('components.navbar')
    {{-- Ini untuk Komponen Navigasi --}}
    <div class="container mx-auto">
        {{-- Ini untuk isi dari container yang berisikan konten dari halamannya --}}
        @yield('container')
    </div>
    @include('components.footer')
</body>

</html>
