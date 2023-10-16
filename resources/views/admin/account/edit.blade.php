@extends('admin.layout.main')
@section('container')

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-xl font-semibold">{{ __('Edit User') }}</h2>
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                class="w-full p-2 mt-1 border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}"
                                class="w-full p-2 mt-1 border rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                            <input type="password" id="password" name="password" placeholder="Leave blank to keep current password"
                                class="w-full p-2 mt-1 border rounded-md">
                        </div>
                        <div>
                            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md">{{ __('Update User') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
