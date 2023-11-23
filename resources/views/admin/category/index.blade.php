@extends('admin.layout.main')
@section('container')
    {{-- <h1 class="text-3xl">Halaman Kategori</h1> --}}
    <div class="">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col items-end w-full gap-4 mb-4">
                {{-- Add User --}}
                {{-- search field --}}
                {{-- <form action="{{ route('category.search') }}" method="GET" class="flex flex-col w-full gap-2 md:flex-row">
                <input type="text" name="search" class="w-full px-2 py-2 bg-white rounded-md text-slate-900 " placeholder="Search">
                <a href="{{ route('category.create') }}" class="w-full px-2 py-2 text-center text-white rounded-md md:w-1/5 bg-slate-900">Tambah category</a>
                <a href="{{ route('category.index') }}" class="w-full px-2 py-2 text-center rounded-md text-slate-900 md:w-1/5 outline outline-slate-900 outline-1">Refresh</a>
            </form> --}}
                <button class="btn" onclick="my_modal_3.showModal()">tambah kategori</button>
                <dialog id="my_modal_3" class="modal">
                    <div class="modal-box">
                        <form method="dialog">
                            <button class="absolute btn btn-sm btn-circle btn-ghost right-2 top-2">✕</button>
                        </form>
                        {{-- Form Input data kategori --}}
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <label for="name" class="block">Nama Kategori</label>
                            <input type="text" id="name" name="name" class="block w-full mb-4"
                                value="{{ old('name') }}">

                            <label for="slug" class="block">Slug</label>
                            <input type="text" id="slug" name="slug" class="block w-full mb-4"
                                value="{{ old('slug') }}">

                            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg">Tambah</button>
                        </form>
                    </div>
                </dialog>
            </div>
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-hidden overflow-x-auto bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <table class="min-w-full border divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left bg-gray-50">
                                        <span
                                            class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Nama
                                            Kategori</span>
                                    </th>
                                    <th class="px-6 py-3 text-left bg-gray-50">
                                        <span
                                            class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Slug</span>
                                    </th>
                                    <th class="px-6 py-3 text-left bg-gray-50">
                                        <span
                                            class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Terakhir
                                            Update</span>
                                    </th>
                                    <th class="px-6 py-3 text-left bg-gray-50">
                                        <span
                                            class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Tombol
                                            Aksi</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach ($categories as $category)
                                    <tr class="bg-white hover:bg-slate-50">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $category->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $category->slug }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ $category->updated_at }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{-- <a href="{{ route('category.edit', $category) }}" class="text-blue-600 hover:text-blue-900">Edit</a> --}}
                                            <form action="{{ route('category.destroy', $category) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div
                    class="px-6 py-2 mx-auto mt-2 transition-all bg-slate-100 hover:text-white hover:bg-slate-200 sm:px-6 lg:px-8">
                    {{-- {{ $category->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    @push('custom-scripts-admin')
        @vite('resources/js/additional-post-script.js')
    @endpush
@endsection
