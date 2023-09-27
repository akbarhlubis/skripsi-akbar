@extends('layout.main')

@section('container')
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
            <h1 class="text-3xl font-semibold text-center text-purple-700">UXiD Lampung</h1>
            <form action="/auth/register" method="POST" x-data="{ formStep: 1 }" class="space-y-4">
                @csrf
                <div x-cloak x-show="formStep === 1">
                    <label class="label">
                        <span class="text-base label-text">Name</span>
                    </label>
                    <input type="text" required value="{{old('name')}}" placeholder="name" name="name" id="name" class="w-full input input-bordered input-primary @error('name')
                        outline-none ring-2 ring-red-500
                    @enderror" />
                    <label class="form-label" for="name">
                        @error('name')
                        : <b class="text-red-500">{{$message}}</b>
                        @enderror
                </label>
                </div>
                <div x-cloak x-show="formStep === 2">
                    <label class="label">
                        <span class="text-base label-text">Email</span>
                    </label>
                    <input type="email" placeholder="Email Address" name="email" id="email" class="w-full input input-bordered input-primary" />
                </div>
                <div x-cloak x-show="formStep === 3">
                    <label class="label">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" class="w-full input input-bordered input-primary" />
                </div>
                {{-- Button Back with Alpine JS --}}
                <button 
                x-cloak 
                x-show="formStep > 1" 
                @click="formStep -= 1" 
                type="button" 
                class="btn btn-block btn-secondary">
                Back</button>
                
                {{-- Button Next with Alpine JS --}}
                <button
                x-cloak
                x-show="formStep < 3"
                @click="formStep += 1"
                type="button"
                class="btn btn-block btn-primary">
                Next Step</button>

                
                <div x-cloak x-show="formStep === 3">
                    <div>
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>
                    <span>Already have an account ?
                        <a href="#" class="text-blue-600 hover:text-blue-800 hover:underline">Login</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection
