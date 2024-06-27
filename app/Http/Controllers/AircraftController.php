<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aircraft;
use App\Models\Event;
use App\Models\Tag;
use App\Models\location;

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
        $locations = $aircraft->locations;
        $aircraft->load('comments.user');
        return view('aircraft.show', compact('aircraft', 'locations'));
    }

    public function create()
    {
        $locations = location::all();
        $tags = Tag::all();
        return view('aircraft.create', compact('tags', 'locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg|max:4096',
            'locations' => 'array',
            'locations.*' => 'exists:locations,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        $aircraft = Aircraft::create($request->all());
        $aircraft->tags()->sync($request->input('tags', []));
        if ($request->has('locations')) {
            $aircraft->locations()->sync($request->input('locations'));
        }

        if ($request->hasFile('image')) {
            $filename = $request->name . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('img'), $filename);
        }
        return redirect()->route('aircraft.index');
    }

    public function edit(Aircraft $aircraft)
    {
        $locations = location::all();
        $tags = Tag::all();
        return view('aircraft.edit', compact('aircraft', 'tags', 'locations'));
    }

    public function update(Request $request, Aircraft $aircraft)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg|max:4096',
            'locations' => 'array',
            'locations.*' => 'exists:locations,id',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->name . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('img'), $filename);
        }
    

        $aircraft->update($request->all());
        $aircraft->tags()->sync($request->input('tags', []));
        if ($request->has('locations')) {
            $aircraft->locations()->sync($request->input('locations'));
        }
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
                    $q->whereIn('tags.id', $tags);
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

