<div class="transition-all shadow-lg card bg-slate-400 hover:scale-105 hover:bg-slate-300">
    <figure>
        <img src="https://picsum.photos/id/2/400/250" class="object-cover w-full h-48" alt="">
    </figure>
    <div class="card-body">
        <h2 class="card-title">{{ $event->name }}</h2>
        <p class="text-sm lg:text-base">{{ $event->description }}</p>
        <div class="card-actions">
            <a class="text-sm btn btn-primary lg:text-base" href="{{route('post-page',['id'=>$event->id])}}">Lihat Detail</a>
        </div>
    </div>
</div>