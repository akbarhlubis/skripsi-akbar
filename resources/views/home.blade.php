{{-- Extend digunakan untuk mengambil layout dari layout/main.blade.blade.php --}}
@extends('layout.main')

{{-- merupakan relasi child dari yield milik main.blade.php --}}
@section('container')
    {{-- Hero Section --}}
    {{-- <img class="absolute -z-50 -left-36 -top-16 h-3/5" src="Ornamen Lampung.png" alt="tes"> --}}
    <div class="flex flex-col justify-center min-h-screen px-10 pt-24 dark:text-white hero dark:bg-transparent md:flex-row">
        <div class="flex flex-col w-full gap-2 md:w-1/2 left-hero">
            <h1 class="font-black text-primary text-7xl">Halo,</h1>
            <p class="text-2xl font-medium">Selamat datang di portal Kegiatan Kemahasiswaan Universitas Teknokrat Indonesia.</p>
            <a class="text-white btn btn-primary w-fit" href="{{route('posts-page')}}">Lihat semua kegiatan</a>
        </div>
        <div class="hidden w-1/2 md:block right-hero gradient-mask-l-90">
            <div class="overflow-hidden rounded-md gradient-mask-r-90">
                <div class="flex justify-around gap-10 py-12 animate-marquee whitespace-nowrap">
                    @forelse ($events as $event)
                    <img class="object-cover w-1/2 transition-all rounded-lg hover:filter-none grayscale hover:scale-105" src="{{ asset('storage/' . $event->image) }}" alt="">
                    {{-- <img class="object-cover w-1/2 transition-all rounded-lg hover:filter-none grayscale hover:scale-105" src="{{ asset('storage/' . $event->image) }}" alt=""> --}}
                    <img class="object-cover w-1/2 transition-all rounded-lg hover:filter-none grayscale hover:scale-105" src="https://kemahasiswaan.teknokrat.ac.id/wp-content/uploads/2023/03/Bunga-Mutiara-170323.jpg" alt="">
                    <img class="object-cover w-1/2 transition-all rounded-lg hover:filter-none grayscale hover:scale-105" src="https://kemahasiswaan.teknokrat.ac.id/wp-content/uploads/2023/03/teknokrat_university-13-03-2023-0002.jpg" alt="">
                    <img class="object-cover w-1/2 transition-all rounded-lg hover:filter-none grayscale hover:scale-105" src="https://kemahasiswaan.teknokrat.ac.id/wp-content/uploads/2022/07/rsz_ids02060.jpg" alt="">
                    <img class="object-cover w-1/2 transition-all rounded-lg hover:filter-none grayscale hover:scale-105" src="https://kemahasiswaan.teknokrat.ac.id/wp-content/uploads/2023/03/Bunga-Mutiara-170323.jpg" alt="">
                    @empty
                    <img class="object-cover w-1/2 transition-all rounded-lg hover:filter-none grayscale hover:scale-105" src="{{asset('default-image.jpg')}}" alt="">
                    <img class="object-cover w-1/2 transition-all rounded-lg hover:filter-none grayscale hover:scale-105" src="{{asset('default-image.jpg')}}" alt="">
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Statistic Section --}}
    <div class="container flex justify-around w-full mx-auto my-6 text-white rounded-md shadow-lg select-none md:w-2/3 bg-primary h-2/4">
        <div class="py-6 text-base font-semibold transition-all md:text-lg hover:scale-110">
            {{ $events->count() }}+ Event
        </div>
        <div class="py-6 text-base font-semibold transition-all md:text-lg hover:scale-110">
            {{$categories->count()}}+ Kategori
        </div>
        <div class="py-6 text-base font-semibold transition-all md:text-lg hover:scale-110">
            {{$registrations->count()}}+ Pendaftar
        </div>
    </div>
    {{-- Event Card Section --}}
    <div class="container px-10 mx-auto dark:text-white">
        {{-- title and description about this section --}}
        <div class="text-start">
            <h2 class="text-3xl font-bold">Kegiatan Mendatang</h2>
            <p class="pt-2 pb-4">Kegiatan atau event yang akan dilaksanakan dalam waktu mendatang</p>
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
    {{-- Category Section --}}
    <div class="container px-10 pt-10 mx-auto dark:text-white">
        {{-- title and description about this section --}}
        <div class="text-start">
            <h2 class="text-3xl font-bold">Kategori Kegiatan</h2>
            <p class="pt-2 pb-4">Kegiatan yang diurutkan berdasarkan kategorinya</p>
        </div>
        {{-- list of categories --}}
        <div class="py-10 overflow-hidden gradient-mask-l-90">
            <div class="py-10 gradient-mask-r-90 bg-[url('/public/pattern_hexagon_transparent.png')]">
                <div class="flex justify-around gap-4 animate-marquee">
                    @foreach ($categories as $category)
                    <div class="block px-24 py-4 font-semibold transition-all bg-white rounded-md shadow-xl text-primary outline outline-1 hover:scale-110">{{$category->name}}</div>
                    @endforeach
                </div>
                <div class="flex justify-around gap-4 animate-marquee2">
                    @foreach ($categories as $category)
                    <div class="block px-24 py-4 font-semibold transition-all bg-white rounded-md shadow-xl text-primary outline outline-1 hover:scale-110">{{$category->name}}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
