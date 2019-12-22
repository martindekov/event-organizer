@extends('layouts.app')

@section('title', 'Create Event')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-center pt-3 pb-2 mb-3">
                <h1>{{ __('EventO') }}</h1>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="event_name">{{ __('Event Name') }}</label>
                        <div>
                            <input id="event_name" 
                            type="text" 
                            class="form-control" 
                            id="validationServer02" 
                            placeholder="Event Name" 
                            name="event_name" 
                            required autocomplete="event_name" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="event_address">{{ __('Event Address') }}</label>
                        <div>
                            <input id="event_address" 
                            type="text" 
                            class="form-control" 
                            id="validationServer02" 
                            placeholder="Event Address" 
                            name="event_address" 
                            required autocomplete="event_address" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <label for="event_description">{{ __('Event Address') }}</label>
                                <div class="col-md-14 mb-3">
                                    <textarea class="form-control" 
                                    name="mailMessege" 
                                    id="event_description" rows="10" 
                                    placeholder="Describe your event in detail..." 
                                    required>
                                    </textarea>
                                </div>
                            </div>
                <div class="form-row">
                            <div class="font-weight-bold pb-1 mb-2">{{ __('Organizer') }}</div>

                            <select name="organizer" class="custom-select mb-3" id="organizer" required>
                                <!-- Foreach user with organizer == true -->
                                <option value="organizer_id_x">Organizer_1</option>
                                <option value="organizer_id_x+1">Organizer_2</option>
                                <option value="organizer_id_x+2">Organizer_3</option>
                            </select>
                        </div>
                <div class="form-group row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-lg btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection