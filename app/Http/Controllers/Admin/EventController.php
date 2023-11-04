<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

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
        $event = Event::get();
        $categories = Category::get();
        return view('admin.event.create', compact('categories','event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => ['required', 'min:10'],
            'body' => ['required', 'min:10'],
            'start_date' => 'required',
            'end_date' => 'required',
            'slug' => ['required', 'unique:events'],
            'image' => ['image', 'max:2048'],
            'category_id' => 'required',
            'link' => 'max:500',
            'embed' => 'max:500',
            'quota' => 'numeric',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('event-images');
        }

        // mengirim id data user yang sedang login
        $validatedData['user_id'] = auth()->user()->id;
        // $request->file('image')->store('event-images');

        Event::create($validatedData);

        return redirect()->route('event.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // show user who have registered to event with id
        $registrations = $event->registrations()->with((['user', 'event']))->paginate(10);
        return view('admin.event.show', compact('event', 'registrations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('admin.event.edit', compact('categories', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'quota' => 'numeric',
            'description' => ['required', 'min:10'],
            'body' => ['required', 'min:10'],
            'start_date' => 'required',
            'end_date' => 'required',
            'slug' => ['required', 'unique:events,slug,' . $event->id],
            'image' => ['image', 'max:2048'],
            'category_id' => 'required',
            'link' => 'max:500',
            'embed' => 'max:500',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('event-images');
        }

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
        
    }

    public function status (Event $event)
    {
        // mengecek kondisi apakah event sudah di publish atau belum
        if ($event->is_published == 1) {
            $event->is_published = 0;
        } else {
            $event->is_published = 1;
        }
        $event->save();

        return back()->with('success', 'Event status updated successfully.');
    }
}
