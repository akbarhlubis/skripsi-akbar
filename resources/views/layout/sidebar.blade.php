{{-- <style>
    * {
        outline: red solid 1px
    }
</style> --}}
<aside class="hidden gap-2 pt-10 overflow-y-auto bg-white shadow-lg w-52 md:block">
    <div class="flex flex-col items-center gap-2 py-10 text-center border-b-2 h-fit">
        @if (Auth()->user()->avatar)
        <img class="object-cover w-20 h-20 rounded-full" src="{{ asset('images/' . Auth()->user()->avatar) }}" alt="">
        @else
        <img class="w-10 rounded-full" src="{{ asset('default-avatar.png') }}" alt="" srcset="">
        @endif
        <h2 class="w-4/5 truncate">{{Auth()->user()->name}}</h2>
        <h5 class="w-4/5 truncate">{{Auth()->user()->email}}</h5>
    </div>
    <div class="flex flex-col gap-2 px-10 text-center">
        <a class="flex items-center justify-center w-full h-10" href="{{route('profile-page')}}">Profile Saya</a>
        <a class="flex items-center justify-center w-full h-10" href="{{route('my-events-page')}}">Event Saya</a>
    </div>
</aside>