<div class="fixed z-50 flex flex-row items-center justify-center w-full px-16 shadow-sm md:justify-between bg-opacity-40 backdrop-blur-md">
    <div class="px-2 py-2 scale-75 rounded-md dark:bg-white">
        <a href="{{ route('home-page') }}">
            <img src="{{ asset('Logo.png') }}" alt="" srcset="">
        </a>
    </div>
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
                    <li><a href="{{ route('admin-dashboard-page') }}">Dashboard Admin</a></li>
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
</div>

{{-- Bottom Navigation --}}
<div class="z-50 btm-nav md:hidden">
    <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('home-page') }}">
        <i class="bi bi-house"></i>
    </a>
    <a class="{{ request()->is('posts*') ? 'active' : '' }}" href="{{ route('posts-page') }}">
        <i class="bi bi-search"></i>
    </a>
    <a class="{{ request()->is('user/my-events') ? 'active' : '' }}" href="{{ route('my-events-page') }}">
        <i class="bi bi-calendar-check"></i>
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
            <i class="bi bi-box-arrow-in-right"></i>
        </a>
    @endauth
</div>

{{-- <div class="py-3 divider lg:divider-horizontal"></div>
<div class="dropdown dropdown-end">
    @auth
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
                @if (Auth()->user()->avatar)
                    <img src="{{ asset('images/' . Auth()->user()->avatar) }}"
                        alt="{{ Auth()->user()->name }}">
                @else
                    <img src="{{ asset('default-avatar.png') }}" alt="" srcset="">
                @endif
            </div>
        </label>
        <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
            <li>
                <a class="justify-between" href="{{ route('profile-page') }}">
                    {{ auth()->user()->name }} Profile
                </a>
            </li>
            <li><a href="{{ route('my-events-page') }}">My Events</a></li>
            <li><a href="{{ route('admin-dashboard-page') }}">Dashboard Admin</a></li>
            <li>
                <form class="" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    @else
        <a class="flex px-4 py-2 text-white transition bg-red-900 rounded-md active:scale-105 hover:bg-primary"
            href="{{ route('login-page') }}">Masuk Akun</a>
    @endauth
</div> --}}
