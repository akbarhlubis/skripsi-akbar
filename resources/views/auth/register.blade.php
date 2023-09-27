@extends('layout.main')

@section('container')
<div class="relative flex flex-col justify-center h-screen overflow-hidden">
    <div class="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
        <h1 class="text-3xl font-semibold text-center text-purple-700">UXiD Lampung</h1>
        <form action="/auth/register" method="POST" x-data="{
            formStep: 1,
            name: '',
            email: '',
            password: '',
            errors: {
                name: '',
                email: '',
                password: '',
            },
            validateStep(step) {
                if (step === 1) {
                    if (!this.name) {
                        this.errors.name = 'Name is required';
                    } else {
                        this.errors.name = '';
                    }
                } else if (step === 2) {
                    if (!this.email) {
                        this.errors.email = 'Email is required';
                    } else if (!this.email.includes('@')) {
                        this.errors.email = 'Invalid email address';
                    } else {
                        this.errors.email = '';
                    }
                } else if (step === 3) {
                    if (!this.password) {
                        this.errors.password = 'Password is required';
                    } else if (this.password.length < 8) {
                        this.errors.password = 'Password must be at least 8 characters long';
                    } else {
                        this.errors.password = '';
                    }
                }
            },
            validateForm() {
                this.validateStep(this.formStep);
                if (this.errors.name || this.errors.email || this.errors.password) {
                    return false;
                }
                return true;
            }
        }" class="space-y-4">
            @csrf
            <div x-cloak x-show="formStep === 1">
                <label class="label">
                    <span class="text-base label-text">Name</span>
                </label>
                <input type="text" required x-model="name" placeholder="name" name="name" id="name" class="w-full input input-bordered input-primary @error('name')
                    outline-none ring-2 ring-red-500
                @enderror" />
                <label class="font-bold text-red-500 form-label" for="name" x-text="errors.name"></label>
            </div>
            <div x-cloak x-show="formStep === 2">
                <label class="label">
                    <span class="text-base label-text">Email</span>
                </label>
                <input type="email" placeholder="Email Address" x-model="email" name="email" id="email" class="w-full input input-bordered input-primary" />
                <label class="font-bold text-red-500 form-label" for="email" x-text="errors.email"></label>
            </div>
            <div x-cloak x-show="formStep === 3">
                <label class="label">
                    <span class="text-base label-text">Password</span>
                </label>
                <input type="password" name="password" x-model="password" id="password" placeholder="Enter Password" class="w-full input input-bordered input-primary" />
                <label class="form-label" for="password" x-text="errors.password"></label>
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
            @click="if (validateForm()) { formStep += 1 }"
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
