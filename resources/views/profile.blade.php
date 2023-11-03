@extends('layout.user')
@section('content')
    <div class="container min-h-screen">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 lg:w-1/2">
                @if (Auth()->user()->avatar)
                    <img class="object-cover w-32 h-32 mx-auto mb-4 rounded-full outline-4 outline outline-gray-300"
                        src="{{ asset('images/' . Auth()->user()->avatar) }}" alt="{{ Auth()->user()->name }}">
                @else
                    <img class="w-32 h-32 mx-auto mb-4 rounded-full" src="{{ asset('default-avatar.png') }}" alt=""
                        srcset="">
                @endif
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg outline outline-1 outline-gray-300">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="mb-4 text-xl font-semibold">{{ __('Edit Profile') }}</h2>
                        <form action="{{ route('profile.update', auth()->id()) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="flex items-center justify-center">
                                <input class="file-input file-input-bordered file-input-sm" type="file" name="avatar"
                                    id="avatar">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                                    class="w-full p-2 mt-1 border rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"
                                    class="w-full p-2 mt-1 border rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                                <input type="password" id="password" name="password"
                                    placeholder="Leave blank to keep current password"
                                    class="w-full p-2 mt-1 border rounded-md">
                            </div>
                            <div>
                                <button type="submit" class="rounded-md btn-primary btn">{{ __('Update User') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="p-6 mt-4 overflow-hidden bg-white shadow-sm sm:rounded-lg outline outline-1 outline-gray-300">
                    <h1 class="text-lg">Hapus Akun</h1>
                    <p class="text-sm text-slate-500">Akun anda akan dihapus secara permanen dan seluruh data yang tersimpan disistem akan dihapus</p>
                    <button class="btn btn-primary" onclick="my_modal_1.showModal()">Hapus Akun</button>
                    <dialog id="my_modal_1" class="modal">
                        <div class="modal-box">
                            <h3 class="text-lg font-bold">PERHATIAN!</h3>
                            <p class="py-4">Apakah anda yakin ingin melanjutkan proses penghapusan akun?</p>
                            <div class="modal-action">
                                <form method="dialog">
                                    <!-- if there is a button in form, it will close the modal -->
                                    <button class="btn">Kembali</button>
                                </form>
                                <form class="w-full" action="{{ route('profile.destroy', auth()->id()) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </div>
            </div>
        </div>
    </div>
@endsection
