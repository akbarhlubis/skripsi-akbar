@extends('admin.layout.main')
@section('container')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-2xl font-semibold">Tambah Pengguna Baru</h2>
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <label for="name" class="block">Nama</label>
                        <input type="text" id="name" name="name" class="block w-full mb-4" value="{{old('name')}}">

                        <label for="email" class="block">Email</label>
                        <input type="email" id="email" name="email" class="block w-full mb-4" value="{{old('email')}}">

                        <label for="password" class="block">Password</label>
                        <input type="password" id="password" name="password" class="block w-full mb-4">

                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection