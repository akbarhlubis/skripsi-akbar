<div class="navbar bg-primary">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('posts-page') }}">Event</a></li>
                <li>
                    <a>Kategori Event</a>
                    <ul class="p-2">
                        <li><a>Mini Course</a></li>
                        <li><a>Webinar</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('about-page') }}">Tentang Kami</a></li>
            </ul>
        </div>
        <a class="text-xl normal-case btn btn-ghost" href="{{ route('home-page') }}">Logo</a>
        {{-- <a class="text-xl normal-case btn btn-ghost" href="{{route('home-page')}}">UXiD Lampung</a> --}}
    </div>
    <div class="hidden navbar-center lg:flex">
        <ul class="px-1 menu menu-horizontal">
            <li><a href="{{ route('posts-page') }}">Event</a></li>
            <li tabindex="0">
                <details>
                    <summary>Kategori Event</summary>
                    <ul class="p-2">
                        <li><a>Mini Course</a></li>
                        <li><a>Webinar</a></li>
                    </ul>
                </details>
            </li>
            <li><a href="{{ route('about-page') }}">Tentang Kami</a></li>
            @auth
                <li><a class="" href="#">Dashboard</a></li>
                <li><a class="" href="#">Event Saya</a></li>
            @endauth

        </ul>
    </div>
    <div class="navbar-end">
        @auth
            {{-- Welcoming word for logged user --}}
            <a class="btn btn-ghost btn-sm rounded-btn">
                <span class="badge badge-success">{{ auth()->user()->name }}</span>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn">Logout</button>
            </form>
        @else
            <a class="btn" href="{{ route('login-page') }}">Login</a>
        @endauth
    </div>
</div>
