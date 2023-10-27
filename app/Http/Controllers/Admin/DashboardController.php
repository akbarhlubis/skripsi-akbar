<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.dashboard',[
        // Limit only 3 events 
        'title' => 'Dasbor',
        'events' => Event::with(['category','user'])->where('is_published', true)->latest()->limit(3)->get(),
        'events_count' => Event::count(),
        'users_count' => User::count(),
        ]);
    }
}   
