{{-- Extend digunakan untuk mengambil layout dari layout/main.blade.blade.php --}}
@extends('layout.main')

@section('container')
    <div class="min-h-screen px-4 pt-16">
        {{-- breadcrumb --}}
        <div class="flex flex-row w-11/12 gap-1 mx-auto overflow-hidden text-xs md:text-base">
            <a href="{{ route('home-page') }}" class="hover:text-gray-700">Home</a>
            <span class="mr-1">/</span>
            <a href="{{ route('posts-page') }}" class="hover:text-gray-700">Event</a>
            <span class="mr-1">/</span>
            <a class="w-1/2 h-full truncate hover:text-gray-700 text-primary">{{ $event->name }}</a>
        </div>
        {{-- Bagian header --}}
        @include('components.header-event')
        <div class="flex flex-col w-11/12 gap-5 py-10 mx-auto lg:flex-row">
            {{-- Table of contents --}}
            <div class="w-full p-4 text-white rounded-md shadow-md top-16 lg:sticky h-fit lg:w-3/12 bg-primary">
                <div class="text-lg font-bold">Table of Contents</div>
                <div id="toc" class="text-sm list-none"></div>
            </div>
            {{-- Body dari post event --}}
            <div class="w-fit">

                <div class="post-content">
                    {{-- Comment this for a while --}}
                    {!! $event->body !!}
                    {{-- This is for testing --}}
                    <div class="">
                        {{-- <h2 class="mb-1 text-xl font-bold">Pengertian Lorem Ipsum</h2>
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
                        <p class="mt-1 text-sm md:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam eum iste error numquam doloribus atque, et blanditiis corporis reprehenderit. Suscipit accusantium eaque nesciunt ullam. Ex similique distinctio, quaerat illum ipsum dolores dolorem blanditiis reprehenderit sit dicta pariatur enim dolor, praesentium quam! Dolorem nulla vitae provident commodi quae quidem, temporibus rerum!</p>
                        <p class="mt-1 text-sm md:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui impedit aspernatur eveniet nostrum beatae ipsa.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Memanggil resource dari kode javascript toc --}}
    @vite('resources/js/table-of-contents.js')
@endsection
