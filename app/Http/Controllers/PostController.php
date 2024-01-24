<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

use function Laravel\Prompts\search;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with(['category','user'])->where('is_published', true)->latest()->paginate(6);
        $categories = Category::all();
        
        if (request('search')){
            $events = Event::where('name', 'like', "%" . request('search') . "%")->paginate(15);
        }
        
        // Return view posts
        return view('posts', compact('events','categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $id)
    {
        $event = $id;
        $registrations = $event->registrations()->with((['user', 'event']))->count();
        
        if ($event->is_published == false) {
            abort(403, 'Access denied');
        }
        
        return view('post')->with([
            'event' => $event,
            'registrations' => $registrations
        ]);
    }
}
