{{-- Extend digunakan untuk mengambil layout dari layout/main.blade.blade.php --}}
@extends('layout.main')

{{-- merupakan relasi child dari yield milik main.blade.php --}}
@section('container')
    {{-- Hero Section --}}
    <div class="min-h-screen px-10 bg-white hero dark:bg-transparent">
        <div class="text-center hero-content">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">UXiD Lampung</h1>
                <p class="py-6">Merupakan komunitas terbuka nirlaba seputar User Experience yang berpusatkan di provinsi
                    Lampung</p>
                <div class="flex flex-col gap-5">
                    @auth
                        <a class="btn btn-primary" href="{{ route('posts-page') }}">
                            Lihat semua event
                        </a>
                    @else
                        <a class="btn btn-primary" href="{{ route('register-page') }}">
                            Bergabung sekarang
                        </a>
                    @endauth
                    <div class="divider">OR</div>
                    <a href="{{route('about-page')}}" class="text-black bg-transparent">Pelajari lebih lanjut</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Event Card Section --}}
    <div class="container px-10 mx-auto">
        {{-- title and description about this section --}}
        <div class="text-center">
            <h2 class="text-3xl font-bold">Event UXiD Lampung</h2>
            <p class="py-6">Berikut merupakan event yang akan diadakan oleh UXiD Lampung</p>
        </div>

        {{-- Event Card --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($events as $event)
                {{-- Foreach card component with variable title and desc --}}
                @include('components.card-event')
            @endforeach
        </div>
        {{-- button all events --}}
        <div class="flex justify-center mt-10">
            <a class="btn btn-primary" href="{{ route('posts-page') }}">
                Lihat semua event
            </a>
        </div>
    </div>
@endsection