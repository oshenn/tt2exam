@extends('layouts.app')

@section('content')
<head>
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }} ">
</head>
<div class="main-container">
    <div class="aircraft-section">
        @foreach ($aircraft as $plane)
        <div class="aircraft-item">
            <img src="path/to/placeholder.jpg" alt="{{ $plane->name }}" class="aircraft-image">
            <div class="aircraft-info">
                <h2>{{ $plane->name }}</h2>
                <p>{{ $plane->body }}</p>
                <a href="{{ route('aircraft.show', $plane->id) }}">Read more</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="sidebar">
        <div class="search-container">
            <input type="text" placeholder="Search..." class="search-bar">
        </div>
        <div class="events-container">
            <h3>Upcoming events</h3>
            <ul class="events-list">
                @foreach ($events as $event)
                <li>{{ $event->name }} - {{ $event->time->format('d-m-Y') }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

