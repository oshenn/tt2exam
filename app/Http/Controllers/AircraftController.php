<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aircraft;
use App\Models\Event;
use App\Models\Tag;

class AircraftController extends Controller
{
    public function index()
    {
        $aircraft = Aircraft::all();
        $events = Event::orderBy('time', 'asc')->take(4)->get();
        $tags = Tag::all();
        return view('aircraft.index', compact('aircraft', 'events', 'tags'));
    }

    public function show(Aircraft $aircraft)
    {
        $aircraft->load('comments.user');
        return view('aircraft.show', compact('aircraft'));
    }
    public function create()
    {
        return view('aircraft.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        Aircraft::create($request->all());
        return redirect()->route('aircraft.index');
    }

    public function edit(Aircraft $aircraft)
    {
        return view('aircraft.edit', compact('aircraft'));
    }

    public function update(Request $request, Aircraft $aircraft)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->name . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('img'), $filename);
        }
    

        $aircraft->update($request->all());
        return redirect()->route('aircraft.index');
    }

    public function destroy(Aircraft $aircraft)
    {
        $aircraft->delete();
        return redirect()->route('aircraft.index');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $tags = $request->input('tags');
    
        $aircraft = Aircraft::query()
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->when($tags, function ($q) use ($tags) {
                $q->whereHas('tags', function ($q) use ($tags) {
                    $q->whereIn('id', $tags);
                });
            })
            ->get();
    
        return view('aircraft.index', [
            'aircraft' => $aircraft,
            'events' => Event::orderBy('time', 'asc')->take(4)->get(),
            'tags' => Tag::all()
        ]);
    }
    
}

