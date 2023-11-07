@extends('admin.layout.main')
@section('container')
{{-- <h1 class="mb-6 text-3xl">Halaman Dasbor</h1> --}}
<div class="grid grid-cols-1 gap-4 text-center md:grid-cols-2">
  <div class="flex flex-col items-center justify-center h-1 col-span-2 p-10 bg-white rounded-lg shadow-md">
    <h1 class="text-lg stat-title">Hi, {{ app('greeting') }} <span class="font-bold text-slate-900">{{auth()->user()->name}}</span> :)</h1>
</div>
<div class="">
  <div class="w-full shadow stats">
    <div class="stat">
      <div class="stat-title">Total Event</div>
      <div class="stat-value">{{$events_count}}</div>
      <div class="stat-desc">banyak event yang telah dibuat</div>
    </div>
  </div>
</div>
<div class="">
  <div class="w-full shadow stats">
    <div class="stat">
      <div class="stat-title">Total User</div>
      <div class="stat-value">{{$users_count}}</div>
      <div class="stat-desc">banyak akun peserta yang telah dibuat</div>
    </div>
  </div>
</div>
</div>
<div class="flex flex-row justify-between mt-6">
    <h1 class="order-first text-2xl">Rangkaian Event Berjalan</h1>
    <a class="order-last text-2xl md:order-2" href="{{route('posts-page')}}">Lihat Lainnya</a>
</div>
<div class="grid grid-cols-1 gap-5 mt-2 -z-50 md:grid-cols-2 lg:grid-cols-3">
    @forelse ($events as $event)
    <div class="w-full text-white card bg-slate-500">
        <div class="card-body">
          <h2 class="card-title">{{$event->name}}</h2>
          <p>{{$event->description}}</p>
          <div class="justify-end card-actions">
            <a href="{{route('post-page',$event->id)}}" class="btn">Lihat Event</a>
          </div>
        </div>
      </div>
      @empty
      Kosong
    @endforelse
</div>

@endsection
