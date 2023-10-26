<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script defer src="https://unpkg.com/alpinejs@latest/dist/cdn.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{$title ?? config('app.name')}} | Admin </title>
</head>
<body>
    <!-- sidebar inside wrapper -->
    @include('sweetalert::alert')
    <div id="wrapper" class="flex" x-data="{isOpen:false}">
        <div 
        id="sidebar" 
        class="absolute h-screen overflow-y-auto transition-all duration-300 md:static bg-slate-900 md:w-[22%] z-50" 
        x-bind:class="isOpen?'w-full':'w-0'">
            <div class="flex justify-end w-full h-auto p-4">
                <x-app-logo/>
                <button
                @click="isOpen=!isOpen"
                class="text-white md:hidden">|||</button>
            </div>
            @include('admin.layout.nav')
        </div>
        <div id="body" class="w-full h-screen overflow-y-auto transition-all duration-300 bg-gray-200">
            <div class="flex justify-between w-full h-auto gap-4 p-4 bg-white shadow-sm">
                <button
                @click="isOpen=!isOpen"
                class="text-slate-900 md:hidden">|||</button>
                <h1 class="text-base font-medium text-slate-900 md:text-2xl">{{$title ?? config('app.name')}}</h1>
                <div class="dropdown dropdown-end">
                    <div tabindex="0" class="flex flex-row items-center gap-2">
                        <label tabindex="0" class="text-slate-900">{{auth()->user()->name}}</label>
                        @if (Auth()->user()->avatar)
                        <img class="object-fill rounded-full outline outline-1 outline-white w-7" src="{{ asset('images/' . Auth()->user()->avatar) }}" alt="{{ Auth()->user()->name }}">
                        @else
                        <img class="object-fill rounded-full outline outline-1 outline-white w-7" src="{{ asset('default-avatar.png') }}" alt="" srcset="">
                        @endif
                    </div>
                    <ul tabindex="0" class="dropdown-content mt-6 z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="{{route('profile-page')}}">Akun Saya</a></li>
                        <li><a href="{{route('home-page')}}">Halaman Utama</a></li>
                    </ul>
                </div>
            </div>
            <div class="px-8 py-4 md:px-4">
                @yield('container')
            </div>
        </div>
    </div>
</body>
</html>