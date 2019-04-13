@extends('layouts.app')

@section('content')
    <div class="login-container">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf

            <h1 class="h3 mb-3 font-weight-normal">msoroka.dev</h1>

            <label for="email" class="sr-only">{{ __('auth.email') }}</label>
            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('auth.email') }}" required autofocus>

            <label for="password" class="sr-only">{{ __('auth.password') }}</label>
            <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   placeholder="{{ __('auth.password') }}" required>

            <button class="btn btn-lg btn-dark btn-block mt-3" type="submit"> {{ __('auth.login') }}</button>
        </form>
    </div>
@endsection
