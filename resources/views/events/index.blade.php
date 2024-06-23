@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }} ">
    </head>
    <h1>Events</h1>
    <ul>
        @foreach ($events as $event)
            <li>
                <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection