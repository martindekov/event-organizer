@extends('layouts.app')

@section('title', 'Contacts')

@section('content')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-10">
                        <form method="POST" action="">
                            @csrf

                            <div class="text-center pt-3 pb-2 mb-3">
                                <h1>{{ __('Contact Us') }}</h1>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 mb-3 offset-md-2">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Work email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group center-block">
                                <div class="col-md-8 mb-3 offset-md-2">
                                    <select name="role" class="custom-select mb-3" id="role" required>
                                        <option value="" disabled selected hidden>What's this about?</option>
                                        <option value="Something1">Something1</option>
                                        <option value="Something2">Something2</option>
                                        <option value="Something3">Something3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 mb-3 offset-md-2">
                                    <textarea class="form-control" name="message" id="message" rows="10" placeholder="Go ahead, we're listening..."></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-2 align-self-center">
                        <div>
                            <label for="email">Email:</label>

                            <div>
                                <label for="email">for admin email</label>
                            </div>
                        </div>

                        <div>
                            <label for="phone">Phone</label>

                            <div>
                                <label for="phone">for admin phone</label>
                            </div>
                        </div>

                        <div>
                            <label for="address">Address:</label>

                            <div>
                                <label for="address">for admin address</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection