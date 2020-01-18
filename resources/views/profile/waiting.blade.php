@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($events == null)
        <div class="offset-md-1">
            <img src="no_events.png" height=600 width=800 />
        </div>
        @else
        @foreach ($events as $event)
            <div class="jumbotron">
                    <div class="container">
                        <h1 class="display-4">{{$event->name}}</h1>
                        <p class="lead">{{$event->description}}</p>
                        <p> {{$event->start_date}} </p>
                        <p> {{$event->end_date}}  </p> 
                        @if (Auth::user()->organizer)
                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="{{ route('event.approve', $event->id)}}" role="button">Approve</a>
                            </p>
                        @endif
                </div> 
            </div>
        @endforeach
        @endif
    </div>
@endsection