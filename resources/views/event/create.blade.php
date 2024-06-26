@extends('layouts.app')

@section('content')
<div class="editcontainer">
    <h1>Create New Event</h1>
    <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">A short description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>

        <div class="form-group">
            <label for="body">A longer description</label>
            <textarea class="form-control" id="body" name="body" rows="20" required></textarea>
        </div>

        <label for="image">event Image:</label>
        <input type="file" name="image" id="image">

        <div class="form-group">
            <label for="time">Event Date</label>
            <input type="date" class="form-control" id="time" name="time" value="" required>
        </div>

        <button type="submit" class="btn btn-primary">Create event</button>
    </form>
</div>
@endsection