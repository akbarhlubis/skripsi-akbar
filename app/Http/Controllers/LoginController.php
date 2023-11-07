<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // menampilkan view login
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request){
        // PERCOBAAN [2] - Buat variabel credentials untuk menampung data login yang telah sukses di validasi
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // PERCOBAAN [3] - Kondisi jika sudah berhasil melewati validasi
        if (Auth::attempt($credentials)) {
            // PERCOBAAN [4] - Tampungan data $request diarahkan ke session lalu di regenerate 
            $request->session()->regenerate();

            // PERCOBAAN [5.1] - Setelah itu diarahkan ke Homepage
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('admin-dashboard-page');
            } else {
                return redirect()->route('home-page');
            }
        }

        // PERCOBAAN [6 or END] - Jika kondisi diatas tidak dapat dilewati maka akan menampilkan ERROR
        return back()->withErrors([
            'email' => 'Email / Password salah!',
        ]);

        // PERCOBAAN [START] - debugging untuk mengetahui apakah data sudah terkirim atau belum dengan dd
        // dd('Berhasil Login');
    }

    public function logout(Request $request){
        // PERCOBAAN [START] - Mengambil method logout() dari Auth
        Auth::logout();
        // PERCOBAAN [2.2] - Membatalkan sesi yang berjalan atau invalidate session
        $request->session()->invalidate();
        // PERCOBAAN [2.3] - Membuat token baru
        $request->session()->regenerateToken();
        // PERCOBAAN [2.4 or END] - Terakhir mengarahkan ke halaman awal('/')
        return redirect('/');
    }
}
