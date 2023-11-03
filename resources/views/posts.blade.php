{{-- Extend digunakan untuk mengambil layout dari layout/main.blade.blade.php --}}
@extends('layout.main')

@section('container')
    {{-- List of event posts with search bar and title --}}
    <div class="container px-10 pt-20 mx-auto">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-primary">Event atau kegiatan</h2>
            <p class="py-6">Berikut kegiatan-kegiatan yang dipublikasikan oleh Kemahasiswaan Universitas Teknokrat Indonesia</p>
        </div>
        <div class="flex flex-col gap-5">
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                <div class="flex flex-col gap-2">
                    <label for="search" class="text-lg font-bold">Cari Event</label>
                    <form class="flex flex-col gap-1 lg:flex-row" accept="/posts">
                        <input type="text" name="search" id="search"
                            class="w-full h-12 px-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            placeholder="Cari Event">
                        <button class="h-12 px-3 text-white btn-primary btn" type="submit" {{ request('search') }}">Search</button>
                    </form>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="search" class="text-lg font-bold">Kategori</label>
                    <select name="category" id="category"
                        class="w-full h-12 px-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="all">Semua Kategori</option>
                        <option value="workshop">Workshop</option>
                        <option value="seminar">Seminar</option>
                        <option value="meetup">Meetup</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="search" class="text-lg font-bold">Urutkan</label>
                    <select name="sort" id="sort"
                        class="w-full h-12 px-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="all">Semua</option>
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($events as $event)
                    @include('components.card-event')
                @endforeach
            </div>
            {{-- pagination from laravel --}}
            <div class="mt-2">
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection
