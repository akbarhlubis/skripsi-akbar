<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // menampilkan view login
    public function index()
    {
        return view('auth.login');
    }
}
