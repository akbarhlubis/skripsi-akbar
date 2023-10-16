<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold mb-4">Update Pengguna</h2>
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name" class="block">Nama</label>
                        <input type="text" id="name" name="name" class="block w-full mb-4" value="{{ $user->name }}">

                        <label for="email" class="block">Email</label>
                        <input type="email" id="email" name="email" class="block w-full mb-4" value="{{ $user->email }}">

                        <label for="password" class="block">Password (biarkan kosong untuk mempertahankan password saat ini)</label>
                        <input type="password" id="password" name="password" class="block w-full mb-4">

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
