<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting', [
            'title' => 'Pengaturan',
            // Mengambil hanya 1 data setting dari database
            'setting' => Setting::findOrFail(1),
        ]);
    }

    public function update(Request $request){
        $validatedData = $request->validate([
            'description' => ['required', 'min:10'],
            'facebook' => 'max:200',
            'instagram' => 'max:200',
            'youtube' => 'max:200',
            'phone' => 'max:200',
            'email' => 'max:200',
        ]);

        Setting::where('id', 1)
            ->update($validatedData);

        return back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}
