@extends('layouts.app')

@section('title', 'events')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-center pt-3 pb-2 mb-3">
                <h1>{{ __('EventO') }}</h1>
            </div>

            <div class="text-center mb-3">
                <h4>Check our public events</h4>
            </div>

            <div class="row">
                @if (auth()->user() && auth()->user()->organizer == false)
                    <div class="col-md-8">
                        <div id="calendar"></div>
                    </div>
                    <div class="col-md-4 align-self-center">
                        <!-- here will be the date of the calendar -->
                        <div class="text-center">
                            <h4>Date of calendar</h4>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12 text-center">
                                <a href="{{ route('event.create') }}" class="btn btn-lg btn-primary">Create event</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div id="calendar"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endsection