<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $events = Event::with('registrations')->whereHas('registrations', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();
        return view('my-events', compact('events'));
    }
}
