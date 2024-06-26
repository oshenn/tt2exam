@extends('layouts.app')

@section('content')
<div class="aircraft-container">
    <div class="aircraft-info-show">
        <div class="aircraft-text">
            <h1>{{ $aircraft->name }}</h1>
            <p class="bodydescription">{{ $aircraft->description }}</p>
            <p class="bodytext">{{ $aircraft->body }}</p>
            <p class="acknowledgement"> Aircraft description from <strong>Wikipedia, the free encyclopedia.<strong></p>
            @if($locations->isNotEmpty())
            <h2>Locations where this aircraft can be seen:</h2>
            <ul>
                @foreach($locations as $location)
                    <li>{{ $location->name }} at {{ $location->location }}</li>
                @endforeach
            </ul>
            @endif
            @auth
            @can('admin')
                <form method="POST" action="{{ route('aircraft.destroy', $aircraft->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class='dangerbutton' type="submit">Delete aircraft</button>
                </form>

                <form method="GET" action="{{ route('aircraft.edit', $aircraft->id) }}">
                    @csrf
                    <button type="submit">Edit aircraft</button>
                </form>
            @endcan
            @endauth
        </div>
        <div class="aircraft-image">
        <img src="{{ asset('img/' . $aircraft->name . '.jpg') }}" alt="{{ $aircraft->name }}" class="aircraft-image">
        </div>
    </div>

    <div class="aircraft-comments">
        <h2>Comments</h2>
        <ul>
            @foreach ($aircraft->comments as $comment)
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
                <input type="hidden" name="commentable_id" value="{{ $aircraft->id }}">
                <input type="hidden" name="commentable_type" value="App\Models\Aircraft">
                <textarea name="body" rows="3" required></textarea>
                <button type="submit">Add Comment</button>
            </form>
        @else
            <p class='logintext'>Log in to add a comment!</p>
        @endauth
    </div>
</div>
@endsection