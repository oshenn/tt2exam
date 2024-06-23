@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }} ">
    </head>
    <h1>{{ $event->name }}</h1>
    <p>{{ $event->body }}</p>
    <p>{{ $event->time->format('d-m-Y') }}</p>
@endsection