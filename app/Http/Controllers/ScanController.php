<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'scan' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        if ($request->scan) {
            $request->scan->move(public_path('images'), $request->scan->getClientOriginalName());
        }

        return back()->with('success', 'Scan uploaded successfully.');
    }
}
