@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="row text-center">
                    <div class="col-md-3 p-5">
                        <img src="" class="img-rounded" alt="Profile picture">
                    </div>
                    <div class="col-md-9 align-self-center">
                        <h2>{{ $user['username'] }}</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="text-center col-md-3 ">
                        <div>
                            <a href="{{ route('profile.edit', auth()->user()->id)}}" class="btn mb-2 mt-2 btn-primary btn-block">Edit Prifile</a>
                        </div>

                        <div>
                            <a href="#" class="btn mb-2 btn-primary btn-block">Change Picture</a>
                        </div>

                        <div>
                            <a href="#" class="btn mb-2 btn-primary btn-block">Change Password</a>
                        </div>
                    </div>

                    <div class="col-md-9 text-center">
                        <div class="text-center border-top pt-3 pb-2">
                            <h4>{{ __('User Details') }}</h4>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('E-mail Address') }}</div>

                                <div>
                                    <label for="email">{{ $user['email'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('First name') }}</div>

                                <div>
                                    <label for="firstname">{{ $user['firstname'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Last name') }}</div>

                                <div>
                                    <label for="lastname">{{ $user['username'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center border-top pt-3 pb-2">
                            <h5>{{ __('Address') }}</h5>
                        </div>

                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Country') }}</div>

                                <div>
                                    <label for="country">{{ $user->address['country'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('City') }}</div>

                                <div>
                                    <label for="city">{{ $user->address['city'] }}</label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('zip') }}</div>

                                @if ($user->address['zip'] == null)
                                <div>
                                    <label for="line_2">{{ __('No zip added') }}</label>
                                </div>
                                @else
                                <div>
                                    <label for="zip">{{ $user->address['zip'] }}</label>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Address Line 1') }}</div>
                                <div>
                                    <label for="line_1">{{ $user->address['line_1'] }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="font-weight-bold pb-1">{{ __('Address Line 2') }}</div>

                                @if ($user->address['line_2'] == null)
                                <div>
                                    <label for="line_2">{{ __('No address added') }}</label>
                                </div>
                                @else
                                <div>
                                    <label for="line_2">{{ $user->address['line_2'] }}</label>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection