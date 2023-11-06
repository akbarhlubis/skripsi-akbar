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
                    <form class="flex flex-col gap-1 lg:flex-row" action="{{route('posts-page')}}">
                        <input type="text" name="search" id="search"
                            class="w-full h-12 px-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            value="{{request('search')}}"
                            placeholder="Cari Event">
                        <button class="h-12 px-3 text-white btn-primary btn" type="submit"">Cari</button>
                    </form>
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
