@extends('layout.user')

@section('content')
    <div class="px-4">
        {{-- breadcrumb --}}
        <div class="flex flex-row w-11/12 gap-1 mx-auto mt-2 overflow-hidden text-xs md:text-base">
            <a href="{{ route('home-page') }}" class="hover:text-gray-700">Home</a>
            <span class="mr-1">/</span>
            <a href="{{ route('my-events-page') }}" class="hover:text-gray-700">Event Saya</a>
        </div>
        {{-- Bagian isi --}}
        <div class="w-11/12 mx-auto">
            <h1 class="text-3xl font-black">Event Saya</h1>
            <div class="mt-5 tabs">
                <a class="w-3/6 font-bold tab tab-bordered tab-active">Mendatang</a>
                <a class="w-3/6 tab tab-bordered">Selesai</a>
            </div>
            <p class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, illum. Consequuntur rem a
                officia ipsum rerum voluptas culpa cum harum!</p>
        </div>
        @foreach ($events as $event)
        <div
            class="flex flex-col w-11/12 gap-2 mx-auto mt-5 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 min-h-fit lg:flex-row">
            {{-- <img class="w-full bg-contain lg:w-1/2" src="https://pbs.twimg.com/media/FuegVVGaAAAyLGM?format=jpg&name=large" alt="#"> --}}
            <img class="w-full bg-contain lg:w-1/2"
                src="https://s3-alpha.figma.com/hub/file/930641581/bdae5e30-5e25-481e-8c40-8000eec56cba-cover.png"
                alt="#">
            <div class="flex flex-col w-full px-4 py-5 lg:w-1/2">
                <div class="mt-3 h-fit">
                    <span class="p-2 text-sm rounded-sm shadow-sm outline outline-1 outline-gray-500">{{$event->category->name}}</span>
                </div>
                <div class="mt-5">
                    <h1 class="text-3xl font-bold">{{$event->name}}</h1>
                    <h1>{{$event->description}}</h2>
                        <button class="w-full btn btn-primary" onclick="my_modal_1.showModal()">Lihat Detail</button>
                        <dialog id="my_modal_1" class="modal modal-bottom sm:modal-middle">
                            <div class="modal-box">
                                <h1 class="text-lg font-bold">Hello!</h1>
                                <p class="py-4">Press ESC key or click the button below to close</p>
                                <div class="modal-action">
                                    <form method="dialog">
                                        <!-- if there is a button in form, it will close the modal -->
                                        <button class="btn">Close</button>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
