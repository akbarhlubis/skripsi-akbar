<div class="transition-all bg-opacity-50 shadow-lg card bg-primary hover:scale-105 hover:bg-opacity-40">
    <figure>
        <img src="https://picsum.photos/id/2/400/250" class="object-cover w-full h-48" alt="">
    </figure>
    <div class="card-body">
        <h2 class="card-title dark:text-white">{{ $event->name }}</h2>
        <p class="text-sm truncate lg:text-base dark:text-white">{{ $event->description }}</p>
        <p class="text-sm truncate lg:text-base dark:text-white">{{ $event->created_at }}</p>
        <div class="card-actions">
            <a class="text-sm btn btn-primary lg:text-base" href="{{route('post-page',['id'=>$event->id])}}">Lihat Detail</a>
        </div>
    </div>
</div>