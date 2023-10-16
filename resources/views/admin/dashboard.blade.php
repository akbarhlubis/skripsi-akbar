@extends('admin.layout.main')
@section('container')
{{-- <h1 class="mb-6 text-3xl">Halaman Dasbor</h1> --}}
<div class="grid grid-cols-1 gap-4 text-center md:grid-cols-2">
  <div class="flex flex-col items-center justify-center h-1 col-span-2 p-10 bg-white rounded-lg shadow-md">
    <h1 class="">Hi, {{ app('greeting') }} {{auth()->user()->name}} :)</h1>
</div>
<div class="">
  <a href="{{route('posts-page')}}" class="flex flex-col items-center justify-center p-10 overflow-hidden transition-all bg-red-200 rounded-lg shadow-md hover:scale-105">
      <h2>Event Berjalan</h2>
      <h1 class="text-3xl font-bold">{{$events_count}}</h1>
  </a>
</div>
<div class="flex flex-col items-center justify-center p-10 bg-white rounded-lg shadow-md">
  <h2>Total User</h2>
  <h1 class="text-3xl font-bold">{{$users_count}}</h1>
</div>
</div>
<div class="flex flex-row justify-between mt-6">
    <h1 class="order-first text-2xl">Rangkaian Event Berjalan</h1>
    <a class="order-last text-2xl md:order-2" href="{{route('posts-page')}}">Lihat Lainnya</a>
</div>
<div class="grid grid-cols-1 gap-5 mt-2 -z-50 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($events as $event)
    <div class="w-full card bg-slate-500 text-primary-content">
        <div class="card-body">
          <h2 class="card-title">{{$event->name}}</h2>
          <p>{{$event->description}}</p>
          <div class="justify-end card-actions">
            <a href="#" class="btn">Lihat Event</a>
          </div>
        </div>
      </div>
    @endforeach
</div>

@endsection
