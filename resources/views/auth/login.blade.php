@extends('layout.main')

@section('container')
<div class="relative flex flex-col justify-center h-screen overflow-hidden">
    <div class="w-full p-6 m-auto bg-white rounded-md shadow-md dark:text-white dark:bg-transparent lg:max-w-lg">
        <h1 class="text-3xl font-semibold text-center">SIMANEV UTI</h1>
        <form method="POST" action="login" class="space-y-4">
            @csrf
            <div>
                <label class="label">
                    <span class="text-base label-text">Email</span>
                </label>
                <div class="w-full 
                @error('email')
                tooltip tooltip-open tooltip-error text-error" 
                @enderror
                data-tip="@error('email') {{$message}} @enderror">
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" class="w-full input input-bordered 
                @error('email')
                    border-error
                @enderror" />
            </div>

            </div>
            <div>
                <label class="label">
                    <span class="text-base label-text">Password</span>
                </label>
                <div class="w-full 
                @error('password')
                tooltip tooltip-open tooltip-error text-error" 
                @enderror
                data-tip="@error('password') {{$message}} @enderror">
                <input type="password" name="password" id="password" value="{{old('password')}}" placeholder="Enter Password"
                    class="w-full input input-bordered
                    @error('password')
                    border-error 
                @enderror" />
            </div>

            </div>
            <a href="{{route('forgot-password-page')}}" class="text-xs text-gray-600 hover:underline hover:text-primary">Lupa password?</a>
            <div>
                <button class="btn btn-primary">Login</button>
                <a href="{{route('register-page')}}" class="btn btn-outline">Register</a>
            </div>
        </form>
    </div>
</div>

@endsection