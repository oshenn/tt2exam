@extends('layouts.app')

@section('content')
<div class="aircraft-container">
    <div class="aircraft-info-show">
        <div class="aircraft-text">
            <h1>{{ $event->name }}</h1>
            <p class="description">{{ $event->description }}</p>
            <p class="details">{{ $event->body }}</p>
            <p class="event-date">Event Date: <strong> {{ $event->time->format('d-m-Y') }} <strong> </p>
            @auth
            @can('admin')
                <form method="POST" action="{{ route('event.destroy', $event->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class='dangerbutton' type="submit">Delete Event</button>
                </form>

                <form method="GET" action="{{ route('event.edit', $event->id) }}">
                    @csrf
                    <button type="submit">Edit Event</button>
                </form>
            @endcan
            @endauth
        </div>
        <div class="aircraft-image">
            <img src="{{ asset('img/' . $event->name . '.jpg') }}" alt="{{ $event->name }}" class="aircraft-image">
        </div>
    </div>
    <div class="aircraft-comments">
        <h2>Comments</h2>
        <ul>
            @foreach ($event->comments as $comment)
                <li>
                    <strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}
                    @auth
                    @can('admin')
                            <form method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class='smallbutton' type="submit">Delete Comment</button>
                            </form>
                    @endcan
                    @endauth
                </li>
            @endforeach
        </ul>

        @auth
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="commentable_id" value="{{ $event->id }}">
                <input type="hidden" name="commentable_type" value="App\Models\Event">
                <textarea name="body" rows="3" required></textarea>
                <button type="submit">Add Comment</button>
            </form>
        @else
            <p class='logintext'>Log in to add a comment!</p>
        @endauth
    </div>
</div>
@endsection
