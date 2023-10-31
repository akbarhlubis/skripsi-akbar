<nav class="flex flex-col gap-3 p-4">
    <a class="flex flex-row gap-2 px-3 py-2 transition-all rounded-lg active:scale-110 hover:scale-105 hover:text-white  text-slate-600 {{ (request()->is('admin')) ? 'text-white bg-slate-600' : '' }}" href="{{route('admin-dashboard-page')}}">
        <x-icon-home/>
        Dasbor
    </a>
    <h1 class="text-white">MANAJEMEN EVENT</h1>
    <a class="flex flex-row gap-2 px-3 py-2 transition-all rounded-lg active:scale-110 hover:scale-105 hover:text-white  text-slate-600 {{ (request()->is('admin/event*')) ? 'text-white bg-slate-600' : '' }}" href="{{route('event.index')}}">
        <x-icon-event/>
        Event atau Kegiatan
    </a>
    <a class="flex flex-row gap-2 px-3 py-2 transition-all rounded-lg active:scale-110 hover:scale-105 hover:text-white  text-slate-600 {{ (request()->is('admin/categories*')) ? 'text-white bg-slate-600' : '' }}" href="{{route('category.index')}}">
        <x-icon-event/>
        Kategori Kegiatan
    </a>
    <h1 class="text-white">MANAJEMEN USER</h1>
    <a class="flex flex-row gap-2 px-3 py-2 transition-all rounded-lg active:scale-110 hover:scale-105 hover:text-white  text-slate-600 {{ (request()->is('admin/users*')) ? 'text-white bg-slate-600' : '' }}" href="{{route('users.index')}}">
        <x-icon-user/>
        Peran dan Pengguna
    </a>
    <h1 class="text-white">SITUS WEB</h1>
    <a class="flex flex-row gap-2 px-3 py-2 transition-all rounded-lg active:scale-110 hover:scale-105 hover:text-white  text-slate-600 {{ (request()->is('admin/setting*')) ? 'text-white bg-slate-600' : '' }}" href="{{route('admin-setting-page')}}">
        <x-icon-setting/>
        Pengaturan
    </a>
    <form class="flex flex-row gap-2 px-2 py-2 text-white transition-all bg-opacity-50 rounded-md active:scale-110 hover:bg-opacity-75 hover:scale-105 bg-error" action="{{ route('logout') }}" method="POST">
        @csrf
        <x-icon-setting/>
        <button type="submit">Logout</button>
    </form>
</nav>
