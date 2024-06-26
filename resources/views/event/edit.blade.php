@extends('layouts.app')

@section('content')
<div class="editcontainer">
    <h1>Edit Event</h1>
    <form method="POST" action="{{ route('event.update', $event->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">A short description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $event->description }}" required>
        </div>

        <div class="form-group">
            <label for="body">A longer description</label>
            <textarea class="form-control" id="body" name="body" rows="20" required>{{ $event->body }}</textarea>
        </div>

        <div class="form-group">
            <label for="time">Event Date</label>
            <input type="date" class="form-control" id="time" name="time" value="{{ $event->time->format('Y-m-d') }}" required>
        </div>

        <label for="image">Event Image/Poster:</label>
        <input type="file" name="image" id="image">

        <button type="submit" class="btn btn-primary">Update event</button>
    </form>
</div>
@endsection
