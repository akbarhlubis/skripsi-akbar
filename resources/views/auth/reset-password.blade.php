@extends('layout.main')

@section('container')
<div class="relative flex flex-col justify-center h-screen overflow-hidden">
    <div class="w-full p-6 m-auto bg-white rounded-md shadow-md dark:text-white dark:bg-transparent lg:max-w-lg">
        <h1 class="text-3xl font-semibold">Reset Password</h1>
        <p class="mt-1 text-slate-500">Silahkan reset password anda dengan menggunakan password yang sebaik mungkin</p>
        <form method="post" action="{{route('password.update')}}" class="space-y-4">
            @csrf
            <div class="w-full @error('password') tooltip tooltip-open tooltip-error text-error" @enderror data-tip="@error('password') {{$message}} @enderror">
                <input type="hidden" name="token" value="{{request()->token}}">
                <input type="hidden" name="email" value="{{request()->email}}">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" class="w-full input input-bordered @error('password') border-error @enderror"/>
                <label for="password">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full input input-bordered @error('password') border-error @enderror"/>
                <button type="submit" class="w-full mt-2 btn btn-primary">Konfirmasi Password</button>
            </div>
        </form>
    </div>
</div>
@endsection