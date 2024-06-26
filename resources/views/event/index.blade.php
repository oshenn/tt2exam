@extends('layouts.app')

@section('content')
<div class="container">
    <div class="events-header">
        <h1>{{__('basic.events')}}</h1>
        <form action="{{ route('events.search') }}" method="GET" class="search-form">
            <input type="text" name="query" placeholder="{{__('basic.searchevents')}}" class="search-bar">
            <button type="submit" class="search-button">{{__('basic.search')}}</button>
        </form>
    </div>
    <hr>
    @auth
    @can('admin')
        <div class="create-Aircraft-button">
            <a href="{{ route('event.create') }}" class="create-button">Create New Event</a>
        </div>
    @endcan
    @endauth
    <hr>
    <div class="events-grid">
        @foreach ($events as $event)
            <div class="event-card">
                <div class="event-image" style="background-image: url('{{ asset('img/' . $event->name . '.jpg') }}');"></div>
                <div class="event-info">
                    <h2><a href="{{ route('event.show', $event->id) }}">{{ $event->name }}</a></h2>
                    <p>{{ $event->time->format('d-m-Y') }}</p>
                    <p>{{ $event->description }}</p>
                    <p class='eventlink'><a href="{{ route('event.show', $event->id) }}">Learn more</a></p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection