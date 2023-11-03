{{-- Extend digunakan untuk mengambil layout dari layout/main.blade.blade.php --}}
@extends('layout.main')

{{-- Section digunakan untuk mengisi konten dari layout/main.blade.php --}}
@section('container')
{{-- Halaman about tentang komunitas SIMANEV UTI --}}
<div class="container pt-20 mx-auto">
    <div class="min-h-screen w-[50%] mx-auto text-justify">
        <h1 class="text-3xl font-semibold text-center text-primary">Tentang Kami</h1>
        <p class="pt-2">Sistem Manajemen Event atau Event Management merupakan sistem berbasis website yang berguna untuk <b>mengelola</b> dan <b>mempublikasikan kegiatan</b> yang diselenggarakan oleh <b>Kemahasiswaan Universitas Teknokrat Indonesia</b>.</p>
        <p class="pt-2">Projek ini dikerjakan oleh <b>Akbar Hamonangan Lubis</b> menggunakan <b>Framework Laravel</b> dan <b>TailwindCSS</b> serta metode Extreme Programmings</p>
    </div>
</div>
@endsection