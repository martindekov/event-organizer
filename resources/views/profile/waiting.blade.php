@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($events as $event)
            <div class="jumbotron">
                    <div class="container">
                        <h1 class="display-4">{{$event->name}}</h1>
                        <p class="lead">{{$event->description}}</p> 
                        @if (Auth::user()->organizer)
                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="{{ route('event.approve', $event->id)}}" role="button">Approve</a>
                            </p>
                        @endif
                </div> 
            </div>
        @endforeach
    </div>
@endsection