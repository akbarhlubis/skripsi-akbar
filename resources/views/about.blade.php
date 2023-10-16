{{-- Extend digunakan untuk mengambil layout dari layout/main.blade.blade.php --}}
@extends('layout.main')

{{-- Section digunakan untuk mengisi konten dari layout/main.blade.php --}}
@section('container')
{{-- Halaman about tentang komunitas SIMANEV UTI --}}
<div class="container mx-auto">
    <div class="flex flex-col justify-center h-screen">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-3xl font-semibold text-center text-purple-700">SIMANEV UTI</h1>
            <p class="text-center">SIMANEV UTI adalah komunitas yang bergerak di bidang User Experience Design yang berada di Lampung. Komunitas ini berdiri pada tanggal 1 Januari 2021.</p>
        </div>
    </div>
</div>
@endsection