@extends('layout.user')

@section('content')
    <div class="w-11/12 px-10 mx-auto">
        {{-- breadcrumb --}}
        <div class="flex flex-row w-full gap-1 mx-auto mt-2 overflow-hidden text-xs md:text-base">
            <a href="{{ route('home-page') }}" class="hover:text-gray-700">Home</a>
            <span class="mr-1">/</span>
            <a href="{{ route('my-events-page') }}" class="hover:text-gray-700">Event Saya</a>
        </div>
        {{-- Bagian isi --}}
        <div class="w-full mx-auto">
            <h1 class="text-3xl font-black">Event Saya</h1>
            <div class="mt-5 tabs">
                {{-- <a class="w-3/6 font-bold tab tab-bordered tab-active">Mendatang</a>
                <a class="w-3/6 tab tab-bordered">Selesai</a> --}}
                @foreach ($events as $event)
                    @include('components.header-event')
                @endforeach
            </div>
        </div>
    </div>
@endsection
