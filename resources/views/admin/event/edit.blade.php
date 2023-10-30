@extends('admin.layout.main')
@section('container')
{{-- Form Untuk membuat event --}}
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="mb-4 text-2xl font-semibold">Edit Event</h2>
                <form action="{{ route('event.update',$event) }}" class="" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="name" class="block">Nama Event</label>
                    <input type="text" id="name" name="name" class="block w-full mb-4 rounded-md" value="{{$event->name}}">
                    <div class="grid grid-cols-1 grid-rows-1 gap-4 md:grid-cols-2">
                        <div class="flex flex-col w-full">
                            <label for="name" class="block">Slug</label>
                            <input type="text" id="slug" name="slug" class="block w-full mb-4 rounded-md" value="{{$event->slug}}">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="category" class="block">Pilih Kategori</label>
                            <select name="category" id="category" class="rounded-md">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <label for="name" class="block">Deskripsi singkat</label>
                    <input type="text" id="description" name="description" class="block w-full mb-4 rounded-md" value="{{$event->description}}">
                    
                    <label for="body">
                        <input id="Body" type="hidden" name="body" value="{{old('body',$event->body)}}" >
                        <trix-editor class="trix-editor" input="Body"></trix-editor>
                    </label>

                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/additional-post-script.js')

@endsection