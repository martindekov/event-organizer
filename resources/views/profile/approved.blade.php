@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($events as $event)  
        <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">{{$event->name}}</h1>
                    <p class="lead">{{$event->description}}</p>
                </div> 
        </div>
        @endforeach
    </div>
@endsection