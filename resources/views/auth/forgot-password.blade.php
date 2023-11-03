@extends('layout.main')

@section('container')
<div class="relative flex flex-col justify-center h-screen overflow-hidden">
    <div class="w-full p-6 m-auto bg-white rounded-md shadow-md dark:text-white dark:bg-transparent lg:max-w-lg">
        <h1 class="text-3xl font-semibold">Lupa Password?</h1>
        <p class="mt-1 text-slate-500">Silahkan masukan alamat email anda untuk dikirimkan kode tautan untuk reset password</p>
        <form method="POST" action="{{route('forgot-password')}}" class="space-y-4">
            @csrf
            <div class="w-full @error('email') tooltip tooltip-open tooltip-error text-error" @enderror data-tip="@error('email') {{$message}} @enderror">
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" class="w-full input input-bordered @error('email') border-error @enderror"/>
                <button class="w-full mt-2 btn btn-primary">Minta Request Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection