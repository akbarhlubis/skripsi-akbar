<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return view posts
        return view('posts',[
            // Variable events with paginate 6 where is_published is true
            'events' => Event::with(['category','user'])->where('is_published', true)->latest()->paginate(6),
            'categories' => \App\Models\Category::all(),
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $registrations = $event->registrations()->with((['user', 'event']))->count();

        return view('post')->with([
            'event' => $event,
            'registrations' => $registrations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Search the specified resource from storage.
     */
    public function search(Request $request){
        $search = $request->input('search');
        $events = Event::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%")
            ->orWhere('link', 'LIKE', "%{$search}%")
            ->orWhere('embed', 'LIKE', "%{$search}%")
            ->orWhere('start_date', 'LIKE', "%{$search}%")
            ->orWhere('end_date', 'LIKE', "%{$search}%")
            ->orWhere('slug', 'LIKE', "%{$search}%")
            ->orWhere('category_id', 'LIKE', "%{$search}%")
            ->orWhere('user_id', 'LIKE', "%{$search}%")
            ->orWhere('is_published', 'LIKE', "%{$search}%")
            ->paginate(6);
        return view('posts', compact('events'));
    }
}
