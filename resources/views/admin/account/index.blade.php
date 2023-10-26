@extends('admin.layout.main')
@section('container')
{{-- <h1 class="text-3xl">Halaman Akun User</h1> --}}
{{-- Create table for manage user --}}
<div class="">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-end w-full gap-4 mb-4">
            {{-- Add User --}}
            {{-- search field --}}
            <form action="{{ route('users.search') }}" method="GET" class="flex flex-col w-full gap-2 md:flex-row">
                <input type="text" name="search" class="w-full px-2 py-2 bg-white rounded-md text-slate-900 " placeholder="Search">
                <a href="{{ route('users.create') }}" class="w-full px-2 py-2 text-center text-white rounded-md md:w-1/5 bg-slate-900">Tambah User</a>
                <a href="{{ route('users.index') }}" class="w-full px-2 py-2 text-center rounded-md text-slate-900 md:w-1/5 outline outline-slate-900 outline-1">Refresh</a>
            </form>
        </div>
        <div class="overflow-hidden bg-white rounded-lg shadow-sm">
            <div class="p-6 overflow-hidden overflow-x-auto bg-white border-b border-gray-200">
                <div class="min-w-full align-middle">
                    <table class="min-w-full border divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span
                                        class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Nama Lengkap</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span
                                        class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Alamat Email</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span
                                        class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Peran</span>
                                </th>
                                {{-- <th class="px-6 py-3 text-left bg-gray-50">
                                    <span
                                        class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Jurusan</span>
                                </th> --}}
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span
                                        class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Tombol Aksi</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach ($users as $user)
                                <tr class="bg-white hover:bg-slate-50">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 truncate whitespace-no-wrap">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 truncate whitespace-no-wrap">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 truncate whitespace-no-wrap">
                                        {{ $user->npm }}
                                    </td>
                                    {{-- <td class="px-6 py-4 text-sm leading-5 text-gray-900 truncate whitespace-no-wrap">
                                        {{ $user->jurusan }}
                                    </td> --}}
                                    {{-- Disable delete for recent user use as for login to prevent accidentaly delete account --}}
                                    @unless (auth()->user()->id == $user->id)
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 truncate whitespace-no-wrap">
                                            <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </td>
                                    @endunless
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            <div
                class="px-6 py-2 mx-auto mt-2 transition-all bg-slate-100 hover:bg-slate-200 sm:px-6 lg:px-8">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection