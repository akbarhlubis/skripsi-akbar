<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Menampilkan view register
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request){
    // Method yang digunakan untuk validasid data yang masuk pada form registrasi
    $validatedData = $request->validate([
        'name'=>'required|max:50',
        'email'=>'email:dns|required|unique:users',
        'password'=>'required|min:5|max:255' 
    ]);

    User::create($validatedData);
    return redirect('auth/login')->with('Success','Successfully to registration');

    }
}
