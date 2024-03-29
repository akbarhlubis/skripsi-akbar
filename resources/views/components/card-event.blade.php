<div class="transition-shadow bg-opacity-50 shadow-none hover:shadow-2xl card hover:bg-opacity-40" data-aos="fade-up">
    <figure>
        @if ($event->image)
        <img src="{{ asset('storage/' . $event->image) }}" class="object-cover w-full h-48" alt="">
        @else
        <img src="{{asset('default-image.jpg')}}" class="object-cover w-full h-48" alt="">
        @endif
    </figure>
    <div class="card-body">
        <h2 class="card-title dark:text-white">{{ $event->name }}</h2>
        <p class="text-sm truncate lg:text-base dark:text-white">{{ $event->description }}</p>
        <p class="text-sm truncate lg:text-base dark:text-white">{{ $event->created_at->diffForHumans() }}</p>
        <div class="card-actions">
            <a class="text-sm btn btn-primary lg:text-base" href="{{ route('post-page', ['id' => $event->slug]) }}">Lihat
                Detail
            </a>
        </div>
    </div>
</div>
