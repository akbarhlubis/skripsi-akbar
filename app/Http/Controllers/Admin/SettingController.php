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
        // dd($request->all());
        $setting = Setting::findOrFail(1);
        $setting->save( $request->all() );

        return redirect()->back()->with('success','Pengaturan berhasil diubah!');
    }
}
