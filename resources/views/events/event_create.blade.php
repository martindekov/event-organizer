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