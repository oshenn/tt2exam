@extends('layouts.app')

@section('content')
<div class="editcontainer">
    <h1>Create New Aircraft</h1>
    <form method="POST" action="{{ route('aircraft.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Aircraft Name</label>
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

        <label for="image">Aircraft Image:</label>
        <input type="file" name="image" id="image">

        <div class="form-group">
            <label for="tags">Tags:</label>
            @foreach($tags as $tag)
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Create Aircraft</button>
    </form>
</div>
@endsection