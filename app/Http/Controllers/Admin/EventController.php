<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data event
        return view('admin.event.index', [
            'title' => 'Event',
            'events' => Event::latest()->paginate(10)
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.event.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => ['required', 'min:10'],
            'body' => ['required', 'min:10'],
            'slug' => ['required', 'unique:events'],
        ]);

        Event::create($request->all());

        return redirect()->route('event.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => ['required', 'min:10'],
            'body' => ['required', 'min:10'],
            'slug' => ['required',],
        ]);

        $event->update($request->all());

        return redirect()->route('event.index')
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $events = $event->delete();
        return back()->with('success', 'Event deleted successfully.');
    }
    /**
     * Summary of search
     * @param \App\Models\Event $event
     * @return void
     */
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $search = $request->search;
        $events = Event::where('name', 'like', "%" . $search . "%")->paginate(15);
        return view('admin.event.index', compact('events'));
    }
}
