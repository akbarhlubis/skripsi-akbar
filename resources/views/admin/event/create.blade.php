@extends('admin.layout.main')
@section('container')
    {{-- Form Untuk membuat event --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-2xl font-semibold">Tambah Event Baru</h2>
                    <form action="{{ route('event.store') }}" class="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="name" class="block">Nama Event</label>
                        <input type="text" id="name" name="name" class="block w-full mb-4 rounded-md"
                            value="{{ old('name') }}">
                        <div class="grid grid-cols-1 grid-rows-1 gap-4 md:grid-cols-2">
                            <div class="flex flex-col w-full">
                                <label for="name" class="block">Slug</label>
                                <input type="text" id="slug" name="slug" class="block w-full mb-4 rounded-md"
                                    value="{{ old('slug') }}">
                            </div>
                            <div class="flex flex-col w-full">
                                <label for="category_id" class="block">Pilih Kategori</label>
                                <select name="category_id" id="category_id" class="rounded-md">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- Alpine checkbox toggle show --}}
                        <div class="flex flex-col gap-2" x-data="{ show: false }">
                            <label for="name" class="block">Embed Form?</label>
                            <button type="button" @click="show = !show"
                                class="w-1/3 px-4 py-2 text-white bg-blue-500 rounded-lg">Tampilkan</button>
                            <input x-show="show" type="url" id="link" name="link"
                                placeholder="Inputkan Link Form atau Pendaftaran (link harus tanpa opsi upload file/gambar)"
                                name="link" class="block w-full mb-4 rounded-md" value="{{ old('link') }}">
                            <input x-show="show" type="url" id="embed" name="embed"
                            placeholder="Inputkan Link Form atau Pendaftaran (link harus tanpa opsi upload file/gambar)"
                            name="embed" class="block w-full mb-4 rounded-md" value="{{ old('embed') }}">
                        </div>

                        <div class="w-full">
                            <label for="image" class="block">Upload gambar</label>
                            <input type="file" name="image" id="image"
                                class="w-full max-w-xs file-input file-input-bordered" />
                        </div>

                        <div class="flex gap-2">
                            <div class="flex flex-col w-full gap-2">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" name="start_date" id="start_date" value="{{old('start_date')}}">
                            </div>
                            <div class="flex flex-col w-full gap-2">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" name="end_date" id="end_date" value="{{old('end_date')}}">
                            </div>
                        </div>

                        <label for="description" class="block">Deskripsi singkat</label>
                        <input type="text" id="description" name="description" class="block w-full mb-4 rounded-md" value="{{ old('description') }}">

                        <label for="quota" class="block">Kuota Peserta</label>
                        <input type="text" id="quota" name="quota" class="block w-full mb-4 rounded-md" value="{{ old('quota') }}">

                        <label for="body">
                            <input id="Body" type="hidden" name="body" value="{{ old('body') }}">
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
