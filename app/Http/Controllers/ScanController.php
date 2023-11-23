<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function scan(Request $request)
    {
        dd($request->barcode);
        // Cek data
        $cek = Registration::where('barcode', $request->barcode)->first();

        // // Jika data tidak ada
        // if (!$cek) {
        //     return back()->with('error', 'Barcode tidak ditemukan');
        // }
        // Registration::where('barcode', $request->barcode)->update([
        //     'is_attended' => true
        // ]);
        // return back()->with('success', 'Berhasil scan barcode');
    }
}
