<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Event;

class AircraftController extends Controller
{
    public function index()
    {
        $aircraft = Aircraft::all();
        $events = Event::orderBy('time', 'asc')->take(4)->get();
        return view('aircraft.index', compact('aircraft', 'events'));
    }

    public function show(Aircraft $aircraft)
    {
        $aircraft->load('comments.user');
        return view('aircraft.show', compact('aircraft'));
    }
}
