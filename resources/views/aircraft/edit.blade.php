@extends('layouts.app')

@section('content')
<div class="editcontainer">
    <h1>Edit Aircraft</h1>
    <form method="POST" action="{{ route('aircraft.update', $aircraft->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Aircraft Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $aircraft->name }}" required>
        </div>

        <div class="form-group">
            <label for="body">Description</label>
            <textarea class="form-control" id="body" name="body" rows="20" required>{{ $aircraft->body }}</textarea>
        </div>

        <label for="image">Aircraft Image:</label>
        <input type="file" name="image" id="image">

        <button type="submit" class="btn btn-primary">Update Aircraft</button>
    </form>
</div>
@endsection
