@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="text-center pt-3 pb-2 mb-2">
                        <h1>{{ __('Fill in the registration form to proceed to EventO') }}</h1>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row">
                            <div class="font-weight-bold pb-1 mb-2">{{ __('Create your account') }}</div>

                            <select name="organizer" class="custom-select mb-3" id="organizer" required>
                                <option value="" disabled selected hidden>Account type</option>
                                <option value="false">Client</option>
                                <option value="true">Organizer</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="username">{{ __('Username') }}</label>

                                <div>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" id="validationServer02" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email">{{ __('Email address') }}</label>

                                <div>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="password">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password-confirm">{{ __('Confirm password') }}</label>

                                <div>
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="firstname">{{ __('First name') }}</label>

                                <div>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="First name" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="lastname">{{ __('Last name') }}</label>

                                <div>
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Last name" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-center border-bottom pb-2 mb-3">
                            {{ __('Address') }}
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="country">Country</label>
                                @include('layouts.country')
                            </div>


                            <div class="col-md-3 mb-3">
                                <label for="city">{{ __('City') }}</label>

                                <div>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip">{{ __('Zip') }}</label>

                                <div>
                                    <input id="zip" type="number" class="form-control @error('zip') is-invalid @enderror" placeholder="Zip" name="zip" value="{{ old('zip') }}" autocomplete="zip" autofocus>

                                    @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="line_1">{{ __('Line 1') }}</label>

                                <div>
                                    <input id="line_1" type="text" class="form-control @error('line_1') is-invalid @enderror" placeholder="Address line 1" name="line_1" value="{{ old('line_1') }}" required autocomplete="line_1" autofocus>

                                    @error('line_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="line_2">{{ __('Line 2') }}</label>

                                <div>
                                    <input id="line_2" type="text" class="form-control @error('line_2') is-invalid @enderror" placeholder="Address line 2" name="line_2" value="{{ old('line_2') }}" autocomplete="line_2" autofocus>

                                    @error('line_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection