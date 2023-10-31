<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // menangkap id user yang sedang login lalu mengecek apakah user tersebut sudah terdaftar pada event tersebut
        $event = Event::findorFail($request->id);
        $attending = $event->registrations()->where('user_id',auth()->id())->first();
        if (!is_null($attending)) {
            $attending->delete();
            return back()->with('success', 'You are no longer attending ' . $event->title);
        } else {
            $attending = $event->registrations()->create([
                'user_id' => auth()->id(),
                'num_tickets' => 1,
                'barcode' => fake()->uuid()
            ]);
            return back()->with('success', 'You are now attending ' . $event->title);
        }
    }
}
