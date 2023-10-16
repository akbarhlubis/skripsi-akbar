@extends('admin.layout.main')
@section('container')
{{-- Form Untuk membuat event --}}
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="mb-4 text-2xl font-semibold">Tambah Event Baru</h2>
                <form action="{{ route('event.store') }}" class="" method="POST">
                    @csrf
                    <label for="name" class="block">Nama Event</label>
                    <input type="text" id="name" name="name" class="block w-full mb-4" value="{{old('name')}}">

                    <label for="category" class="block">Pilih Kategori</label>
                    <select name="category" id="category">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <label for="name" class="block">Slug</label>
                    <input type="text" id="slug" name="slug" class="block w-full mb-4" value="{{old('slug')}}">
                    
                    <label for="name" class="block">Deskripsi singkat</label>
                    <input type="text" id="description" name="description" class="block w-full mb-4" value="{{old('description')}}">

                    <x-quill-editor 
                    label="Body" 
                    name="body"
                    value="{{old('body')}}" 
                    {{-- endpoint="/uploads" --}}
                    placeholder="Silahkan tulis disini..." />

                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg">Tambah</button>
                </form>
@endsection