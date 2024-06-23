@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }} ">
    </head>
    <h1>{{ $aircraft->name }}</h1>
    <p>{{ $aircraft->body }}</p>

    <h2>Comments</h2>
    <ul>
        @foreach ($aircraft->comments as $comment)
            <li>
                <strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}
            </li>
        @endforeach
    </ul>

        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="commentable_id" value="{{ $aircraft->id }}">
            <input type="hidden" name="commentable_type" value="App\Models\Aircraft">
            @auth
            <textarea name="body" rows="3" required></textarea>
            <button type="submit">Add Comment</button>
            @else
            <p>Log in to add a comment!</p>
        </form>
    @endauth
@endsection