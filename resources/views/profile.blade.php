@extends('layout.user')
@section('content')
<div class="container min-h-screen">
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 lg:w-1/2">
            @if (Auth()->user()->avatar)
                <img class="object-cover w-32 h-32 mx-auto mb-4 rounded-full outline-4 outline outline-gray-300" src="{{ asset('images/' . Auth()->user()->avatar) }}" alt="{{ Auth()->user()->name }}">
            @else
            <img class="w-32 h-32 mx-auto mb-4 rounded-full" src="{{asset('default-avatar.png')}}" alt="" srcset="">
            @endif
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg outline outline-1 outline-gray-300">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-xl font-semibold">{{ __('Edit Profile') }}</h2>
                    <form action="{{ route('profile.update',auth()->id()) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex items-center justify-center">
                            <input class="file-input file-input-bordered file-input-sm" type="file" name="avatar" id="avatar">
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
                            <input type="password" id="password" name="password" placeholder="Leave blank to keep current password"
                                class="w-full p-2 mt-1 border rounded-md">
                        </div>
                        <div>
                            <button type="submit" class="rounded-md btn-primary btn">{{ __('Update User') }}</button>
                            <a class="btn btn-error" href="{{route('profile.delete',Auth()->id())}}">Delete Akun</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection