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
            <label for="description">A short description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $aircraft->description }}" required>
        </div>

        <div class="form-group">
            <label for="body">A longer description</label>
            <textarea class="form-control" id="body" name="body" rows="20" required>{{ $aircraft->body }}</textarea>
        </div>

        <label for="image">Aircraft Image:</label>
        <input type="file" name="image" id="image">

        <div class="form-group">
            <label for="tags">Tags:</label>
            @foreach($tags as $tag)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        @if($aircraft->tags->contains($tag)) checked @endif
                        > {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="locations">Locations:</label>
            @foreach($locations as $location)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="locations[]" value="{{ $location->id }}"
                        @if($aircraft->locations->contains($location)) checked @endif
                        > {{ $location->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="submitbutton">Update Aircraft</button>
    </form>
</div>
@endsection
