@extends('layouts.app')

@section('title', 'EventO')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="background-color:lightgreen">
            <div class="text-center pt-3 pb-2 mb-3">
                <h1>{{ __('EventO') }}</h1>
            </div>

            @if (Route::has('login'))
            @auth
            <div class="text-center mb-3">
                <h4>Upcoming approved events</h4>
            </div>
            @else
            <div class="text-center mb-3">
                <h4>Check our public events</h4>
            </div>
            @endauth
            @endif

            <div class="row" style="background-color:pink">
                <div class="col-md-8" style="background-color:aqua">
                    <div id="calendar"></div>
                </div>

                <div class="col-md-4 align-self-center" style="background-color:yellow">
                    <!-- Tuk shte slojim denq ot kalendara -->
                    <div class="text-center">
                        <h4>Date of calendar</h4>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-md-12 text-center">
                            <a href="#" class="btn btn-lg btn-primary">Create event</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection