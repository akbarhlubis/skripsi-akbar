@extends('admin.layout.main')
@section('container')
    {{-- Form Untuk membuat event --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-2xl font-semibold">Pengaturan</h2>
                    <form action="{{route('setting.update')}}" class="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="name" class="block">Deskripsi</label>
                        <input type="text" id="description" name="description" class="block w-full mb-4 rounded-md" value="{{ old('description', $setting->description) }}">
                        <h2 class="mb-2 text-xl font-semibold">Sosial Media</h2>
                        <div class="grid grid-flow-row gap-2 md:gap-4 md:grid-flow-col">
                            <div class="">
                                <label for="name" class="block">Instagram</label>
                                <input type="text" id="instagram" name="instagram" class="block w-full mb-4 rounded-md" value="{{ old('instagram', $setting->instagram) }}">
                            </div>
                            <div class="">
                                <label for="name" class="block">Youtube</label>
                                <input type="text" id="youtube" name="youtube" class="block w-full mb-4 rounded-md" value="{{ old('youtube', $setting->youtube) }}">
                            </div>
                            <div class="">
                                <label for="name" class="block">Facebook</label>
                                <input type="text" id="facebook" name="facebook" class="block w-full mb-4 rounded-md" value="{{ old('facebook', $setting->facebook) }}">
                            </div>
                        </div>
                        <h2 class="mb-2 text-xl font-semibold">Informasi Kontak</h2>
                        <div class="grid grid-flow-col gap-4">
                            <div class="">
                                <label for="name" class="block">Telepon</label>
                                <input type="text" id="phone" name="phone" class="block w-full mb-4 rounded-md" value="{{ old('phone', $setting->phone) }}">
                            </div>
                            <div class="">
                                <label for="name" class="block">Alamat Email</label>
                                <input type="text" id="email" name="email" class="block w-full mb-4 rounded-md" value="{{ old('email', $setting->email) }}">
                            </div>
                        </div>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/additional-post-script.js')
@endsection