<div class="fixed z-50 shadow-sm bg-opacity-40 backdrop-blur-md navbar bg-base-100 md:relative">
  <div class="flex-1">
    <a class="text-xl normal-case btn btn-ghost">Sistem Manajemen Event</a>
  </div>
  <div class="flex-none hidden gap-2 md:contents">
    <ul class="gap-2 px-1 menu menu-horizontal">
        <li><a class="{{ (request()->is('/')) ? 'btn-active' : '' }}" href="{{ route('home-page') }}">Beranda</a></li>
        <li><a class="{{ (request()->is('posts')) ? 'btn-active' : '' }}" href="{{ route('posts-page') }}">Kegiatan</a></li>
        <li tabindex="0">
            <details>
                <summary>Kategori</summary>
                <ul class="mt-10">
                    <li><a>Webinar</a></li>
                    <li><a>Seminar</a></li>
                    <li><a>Workshop</a></li>
                </ul>
            </details>
        </li>
        <li><a class="{{ (request()->is('about')) ? 'btn-active' : '' }}" href="{{ route('about-page') }}">Tentang Kami</a></li>

    </ul>
    <div class="py-3 divider lg:divider-horizontal"></div> 
    <div class="dropdown dropdown-end">
        @auth
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="https://avatars.githubusercontent.com/u/73776051?v=4" />
        </div>
      </label>
      <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
        <li>
          <a class="justify-between">
            {{auth()->user()->name}} Profile
          </a>
        </li>
        <li><a href="{{route('my-events-page')}}">My Events</a></li>
        <li><a href="{{route('admin-dashboard-page')}}">Dashboard Admin</a></li>
        <li>
          <form class="" action="{{ route('logout') }}" method="POST">
          @csrf
          {{-- <x-icon-setting/> --}}
          <button type="submit">Logout</button>
        </form>
          </li>
      </ul>
      @else
      <a class="flex px-4 py-2 text-white transition bg-red-900 rounded-md active:scale-105 hover:bg-red-500" href="{{ route('login-page') }}">Masuk Akun</a>
      @endauth
    </div>
  </div>
</div>

{{-- Bottom Navigation --}}
<div class="z-50 btm-nav md:hidden">
    <button class="active">
        Home
    </button>
    <button>
        Pencarian
    </button>
    <button>
        Kegiatan
    </button>
    <button>
        Kategori
    </button>
    <button>
        Profile
    </button>
  </div>
