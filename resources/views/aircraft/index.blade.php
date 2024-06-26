@extends('layouts.app')

@section('content')
<div class="main-container">
<div class="aircraft-section">
    @forelse ($aircraft as $plane)
        <div class="aircraft-box" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('{{ asset('img/' . $plane->name . '.jpg') }}');">
            <div class="aircraft-info">
                <h2>{{ $plane->name }}</h2>
                <p>{{ $plane->description }}</p>
                <a class="read-more" href="{{ route('aircraft.show', $plane->id) }}">{{__('basic.readmore')}}</a>
            </div>
        </div>
    @empty
        <p>{{__('basic.noaircraft')}}</p>
    @endforelse
</div>

<div class="sidebar">
    <div class="search-container">
        <form action="{{ route('aircraft.search') }}" method="GET">
            <input type="text" name="query" placeholder="{{__('basic.searchaircraft')}}" class="search-bar">
            @foreach ($tags as $tag)
                <div class="checkbox">
                    <input type="checkbox" id="tag_{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                    <label for="tag_{{ $tag->id }}">{{__('basic.' . $tag->name) }}</label>
                </div>
            @endforeach
            <button type="submit" class='search-button'>Search</button>
            <hr>
            @auth
            @can('admin')
            <div class="create-aircraft-button">
                <a href="{{ route('aircraft.create') }}" class="create-button">Create New Aircraft</a>
            </div>
            @endcan
            @endauth
            <hr>
        </form>
    </div>
        <div class="events-container">
            <h3>{{__('basic.upcomingevents')}}</h3>
            <ul class="events-list">
                @foreach ($events as $event)
                <li>{{ $event->name }} - {{ $event->time->format('d-m-Y') }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

