@extends('layout.main')

@section('container')
<div class="relative flex flex-col justify-center h-screen overflow-hidden">
    <div class="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
        <h1 class="text-3xl font-black text-center uppercase text-primary">Selamat datang di halaman Login</h1>
        <form id="FormRegister" action="/auth/register" method="POST" x-data="{
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
                <input type="text" required x-model="name" placeholder="Nama Lengkap" name="name" id="name" class="w-full input input-bordered input-primary @error('name')
                    outline-none ring-2 ring-primary
                @enderror" />
                <label class="font-bold text-primary form-label" for="name" x-text="errors.name"></label>
            </div>
            <div x-cloak x-show="formStep === 2">
                <label class="label">
                    <span class="text-base label-text">Email</span>
                </label>
                <input type="email" placeholder="alamat@email.com" x-model="email" name="email" id="email" class="w-full input input-bordered input-primary" />
                <label class="font-bold text-primary form-label" for="email" x-text="errors.email"></label>
            </div>
            <div x-cloak x-show="formStep === 3">
                <label class="label">
                    <span class="text-base label-text">Password</span>
                </label>
                <input type="password" name="password" x-model="password" id="password" placeholder="Masukan password" class="w-full input input-bordered input-primary" />
                <label class="form-label" for="password" x-text="errors.password"></label>
            </div>
            {{-- Button Back with Alpine JS --}}
            <div class="flex gap-2">
                <button 
                x-cloak 
                x-show="formStep > 1" 
                @click="formStep -= 1" 
                type="button" 
                class="btn btn-outline">
                Back</button>
                
                {{-- Button Next with Alpine JS --}}
                <button
                x-cloak
                x-show="formStep < 3"
                @click="if (validateForm()) { formStep += 1 }"
                type="button"
                class="w-full py-3 text-white rounded-md bg-primary">
                Next Step</button>
                
                <button 
                x-cloak x-show="formStep === 3"
                class="w-full py-3 text-white rounded-md bg-primary" 
                type="submit">
                Register</button>
            </div>
            <span class="pt-2">Sudah punya akun?
                <a href="#" class="text-primary hover:text-primary-focus hover:underline">Login disini</a>
            </span>
        </form>
    </div>
</div>
<script>
      const form = document.getElementById('FormRegister');
  form.addEventListener('keypress', function(e) {
    if (e.keyCode === 13) {
      e.preventDefault();
    }
  });
</script>
@endsection
