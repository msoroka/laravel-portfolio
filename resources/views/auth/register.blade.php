@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input id="first_name" type="text"
                                               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                               name="first_name" value="{{ old('first_name') }}" required
                                               placeholder="{{ __('auth.first_name') }}">

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input id="last_name" type="text"
                                               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                               name="last_name" value="{{ old('last_name') }}" required
                                               placeholder="{{ __('auth.last_name') }}">

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required
                                               placeholder="{{ __('auth.email') }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input id="phone" type="text"
                                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                               name="phone" value="{{ old('phone') }}" required
                                               placeholder="{{ __('auth.phone') }}">

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required placeholder="{{ __('auth.password') }}">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">

                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required
                                               placeholder="{{ __('auth.password-confirm') }}">
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input id="city" type="text"
                                               class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                               name="city" value="{{ old('city') }}" required
                                               placeholder="{{ __('auth.city') }}">

                                        @if ($errors->has('city'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input id="country" type="text"
                                               class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                               name="country" value="{{ old('country') }}" required
                                               placeholder="{{ __('auth.country') }}">

                                        @if ($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input id="birth_date" type="date"
                                               class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}"
                                               name="birth_date" value="{{ old('birth_date') }}" required
                                               placeholder="{{ __('auth.birth_date') }}">

                                        @if ($errors->has('birth_date'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="text-center mb-0">
                                <button type="submit" class="btn btn-block btn-dark btn-primary">
                                    {{ __('auth.register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
