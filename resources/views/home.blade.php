{{-- Extend digunakan untuk mengambil layout dari layout/main.blade.blade.php --}}
@extends('layout.main')

{{-- merupakan relasi child dari yield milik main.blade.php --}}
@section('container')
    {{-- Hero Section --}}
    <div class="min-h-screen bg-white hero">
        <div class="text-center hero-content">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">UXiD Lampung</h1>
                <p class="py-6">Merupakan komunitas terbuka nirlaba seputar User Experience yang berpusatkan di provinsi
                    Lampung</p>
                <div class="flex flex-col gap-5">
                    <button class="btn btn-primary">Gabung UXiD Lampung</button>
                    <button class="text-black bg-transparent">Pelajari lebih lanjut</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Event Card Section --}}
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
            <div class="shadow-lg card">
                <figure>
                    <img src="https://picsum.photos/id/1005/400/250" class="object-cover w-full h-48" alt="">
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Event 1</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    <div class="card-actions">
                        <button class="btn btn-primary">Lihat Detail</button>
                    </div>
                </div>
            </div>
            <div class="shadow-lg card">
                <figure>
                    <img src="https://picsum.photos/id/1005/400/250" class="object-cover w-full h-48" alt="">
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Event 2</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    <div class="card-actions">
                        <button class="btn btn-primary">Lihat Detail</button>
                    </div>
                </div>
            </div>
            <div class="shadow-lg card">
                <figure>
                    <img src="https://picsum.photos/id/1005/400/250" class="object-cover w-full h-48" alt="">
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Event 3</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                    <div class="card-actions">
                        <button class="btn btn-primary">Lihat Detail</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
