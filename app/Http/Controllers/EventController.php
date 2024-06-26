<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('time', 'asc')->get();
        return view('event.index', compact('events'));
    }

    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'body' => 'required|string',
            'time' => 'required',
        ]);

        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'body' => $request->body,
            'time' => $request->time,
        ]);
        return redirect()->route('event.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index');
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'body' => 'required|string',
            'time' => 'required',
            'image' => 'nullable|image|mimes:jpg|max:4096',
        ]);

        $event = Event::create($request->all());

        if ($request->hasFile('image')) {
            $filename = $request->name . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('img'), $filename);
        }
        return redirect()->route('event.index');
    }

    public function search(Request $request)
    {
    $query = $request->input('query');
    $events = Event::where('name', 'LIKE', '%' . $query . '%')->get();
    return view('event.index', compact('events'));
    }
}