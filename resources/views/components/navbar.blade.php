<div class="fixed z-50 flex flex-row items-center justify-between w-full px-2 shadow-sm md:px-16 bg-opacity-40 backdrop-blur-md">
    <div class="px-2 py-2 scale-75 rounded-md dark:bg-white">
        <a href="{{ route('home-page') }}">
            <img src="{{ asset('Logo.png') }}" alt="" srcset="">
        </a>
    </div>
    {{-- Navbar Desktop --}}
    <nav class="flex-row items-center hidden gap-4 md:flex">
        <div
            class=" {{ request()->is('/') ? 'border-b-4 border-primary' : 'text-gray-400 hover:text-primary-focus' }} transition-all">
            <a href="{{ route('home-page') }}">Beranda</a>
        </div>
        <div
            class="{{ request()->is('posts*') ? 'border-b-4 border-primary' : 'text-gray-400 hover:text-primary-focus' }} transition-all">
            <a href="{{ route('posts-page') }}">Kegiatan</a>
        </div>
        <div
            class="{{ request()->is('about*') ? 'border-b-4 border-primary' : 'text-gray-400 hover:text-primary-focus' }} transition-all">
            <a href="{{ route('about-page') }}">Tentang Kami</a>
        </div>
        <div class="py-3 divider lg:divider-horizontal"></div>
        <input id="dark-toggle" type="checkbox" class="toggle toggle-sm toggle-secondary" />
        <div class="dropdown dropdown-end">
            @auth
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        @if (Auth()->user()->avatar)
                            <img src="{{ asset('images/' . Auth()->user()->avatar) }}" alt="{{ Auth()->user()->name }}">
                        @else
                            <img src="{{ asset('default-avatar.png') }}" alt="" srcset="">
                        @endif
                    </div>
                </label>
                <ul tabindex="0" class="z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between" href="{{ route('profile-page') }}">
                            {{ auth()->user()->name }} Profile
                        </a>
                    </li>
                    <li><a href="{{ route('my-events-page') }}">My Events</a></li>
                    @role('admin')
                        <li><a href="{{ route('admin-dashboard-page') }}">Dashboard Admin</a></li>
                    @endrole
                    <li>
                        <form class="w-full" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="block w-full" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            @else
                <a class="flex px-4 py-2 text-white transition rounded-md bg-primary active:scale-105 hover:bg-primary"
                    href="{{ route('login-page') }}">Masuk Akun</a>
            @endauth
        </div>
    </nav>
    {{-- Navbar Mobile with Hamburger --}}
    @auth
    <div class="md:hidden">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                @role('admin')
                <li><a href="{{ route('admin-dashboard-page') }}">Dashboard Admin</a></li>
                @endrole
                <li>
                    <form class="w-full" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="block w-full" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    @endauth
</div>

{{-- Bottom Navigation --}}
<div class="z-50 mt-4 btm-nav md:hidden dark:bg-slate-950 dark:text-white">
    <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('home-page') }}">
        <i class="bi bi-house dark:text-primary"></i>
    </a>
    <a class="{{ request()->is('posts*') ? 'active' : '' }}" href="{{ route('posts-page') }}">
        <i class="bi bi-search dark:text-primary"></i>
    </a>
    <a class="{{ request()->is('user/my-events') ? 'active' : '' }}" href="{{ route('my-events-page') }}">
        <i class="bi bi-calendar-check dark:text-primary"></i>
    </a>
    @auth
        <a class="{{ request()->is('user/profile') ? 'active' : '' }}" href="{{ route('profile-page') }}">
            <div class="w-5 rounded-full outline outline-2">
                @if (Auth()->user()->avatar)
                    <img src="{{ asset('images/' . Auth()->user()->avatar) }}" alt="{{ Auth()->user()->name }}">
                @else
                    <img src="{{ asset('default-avatar.png') }}" alt="" srcset="">
                @endif
            </div>
        </a>
    @else
        <a class="{{ request()->is('auth/login') ? 'active' : '' }}" href="{{ route('login-page') }}">
            <i class="bi bi-box-arrow-in-right dark:text-primary"></i>
        </a>
    @endauth
</div>
