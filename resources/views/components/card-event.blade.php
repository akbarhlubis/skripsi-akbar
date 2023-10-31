<div class="transition-all bg-white bg-opacity-50 hover:shadow-lg card hover:scale-105 hover:bg-opacity-40">
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
            <a class="text-sm btn btn-primary lg:text-base" href="{{ route('post-page', ['id' => $event->id]) }}">Lihat
                Detail
            </a>
        </div>
    </div>
</div>
