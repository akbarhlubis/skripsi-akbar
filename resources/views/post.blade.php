{{-- Extend digunakan untuk mengambil layout dari layout/main.blade.blade.php --}}
@extends('layout.main')

@section('container')
    <div class="min-h-screen px-4">
        {{-- breadcrumb --}}
        <div class="flex flex-row w-11/12 gap-1 mx-auto mt-10 overflow-hidden text-xs md:text-base">
            <a href="{{route('home-page')}}" class="hover:text-gray-700">Home</a>
            <span class="mr-1">/</span>
            <a href="{{route('posts-page')}}" class="hover:text-gray-700">Event</a>
            <span class="mr-1">/</span>
            <a class="h-full truncate hover:text-gray-700 text-primary">{{$event->name}}</a>
        </div>
        <div
            class="flex flex-col w-11/12 gap-2 mx-auto mt-5 overflow-hidden bg-white rounded-lg shadow-lg min-h-fit lg:flex-row">
            {{-- <img class="w-full bg-contain lg:w-1/2" src="https://pbs.twimg.com/media/FuegVVGaAAAyLGM?format=jpg&name=large" alt="#"> --}}
            <img class="w-full bg-contain lg:w-1/2"
                src="https://s3-alpha.figma.com/hub/file/930641581/bdae5e30-5e25-481e-8c40-8000eec56cba-cover.png"
                alt="#">
            <div class="flex flex-col w-full px-4 py-5 lg:w-1/2">
                <div class="mt-3 h-fit">
                    <span class="p-2 text-sm rounded-sm shadow-sm outline outline-1 outline-gray-500">Mini Course</span>
                    <span class="p-2 text-sm rounded-sm shadow-sm outline outline-1 outline-gray-500">Online</span>
                </div>
                <div class="mt-5">
                    <h1 class="text-3xl font-bold">{{ $event->name }}</h1>
                    <h1>{{ $event->published_at }}</h2>
                        <button class="w-full btn btn-primary" onclick="my_modal_1.showModal()">RSVP Event</button>
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
        <div class="flex flex-col w-11/12 gap-5 py-10 mx-auto lg:flex-row">
            {{-- Table of contents --}}
            <div class="w-full p-4 text-white rounded-md shadow-md top-2 lg:sticky h-fit lg:w-3/12 bg-primary">
                <div class="text-lg font-bold">Table of Contents</div>
                <div id="toc" class="text-sm list-none"></div>
            </div>
            {{-- Body dari post event --}}
            <div class="w-fit">

                <body class="text-lg">
                    {{-- Comment this for a while --}}
                    {{-- {{$event->body}} --}}

                    {{-- This is for testing --}}
                    <h2 class="mb-1 text-xl font-bold">Pengertian Lorem Ipsum</h2>
                    <p class="mt-1 text-sm md:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, similique. Distinctio sapiente, vitae odit atque expedita ratione temporibus minus
                        exercitationem quis neque tenetur veritatis eos aperiam totam! Nesciunt, quibusdam illo?</p>
                    <h2 class="mt-2 mb-1 text-xl font-bold">Perbedaan Lorem & Ipsum</h2>
                    <p class="mt-1 text-sm md:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio
                        facere fugiat animi vitae tempore totam repellat libero voluptate non ex!</p>
                    <p class="mt-1 text-sm md:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque
                        aliquam, fugit sit amet laborum nemo vitae voluptatum repudiandae delectus accusamus?</p>
                    <h2 class="mt-2 mb-1 text-xl font-bold">Contoh Lorem Ipsum</h2>
                    <p class="mt-1 text-sm md:text-base"><span class="font-bold">Lorem:</span> ipsum dolor sit amet.</p>
                    <p class="mt-1 text-sm md:text-base"><span class="font-bold">Lorem:</span> ipsum dolor sit amet.</p>
                    <p class="mt-1 text-sm md:text-base"><span class="font-bold">Lorem:</span> ipsum dolor sit amet.</p>
                    <p class="mt-1 text-sm md:text-base"><span class="font-bold">Lorem:</span> ipsum dolor sit amet.</p>
                    <p class="mt-1 text-sm md:text-base"><span class="font-bold">Lorem:</span> ipsum dolor sit amet.</p>
                    <p class="mt-1 text-sm md:text-base"><span class="font-bold">Lorem:</span> ipsum dolor sit amet.</p>
                    <p class="mt-1 text-sm md:text-base"><span class="font-bold">Lorem:</span> ipsum dolor sit amet.</p>
                    <p class="mt-1 text-sm md:text-base"><span class="font-bold">Lorem:</span> ipsum dolor sit amet.</p>
                    <h2 class="mt-2 mb-1 text-xl font-bold">Penutup</h2>
                    <p class="mt-1 text-sm md:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla earum distinctio quos magni. Harum veniam in sunt, nam dolor voluptates nobis repellat odit cum ullam aut accusamus et, illo labore.</p>
                </body>
            </div>
        </div>
    </div>
    {{-- Memanggil resource dari kode javascript toc --}}
    @vite('resources/js/table-of-contents.js')
@endsection
