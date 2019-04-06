@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('auth.verify.header') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('auth.verify.sent') }}
                            </div>
                        @endif

                        {{ __('auth.verify.check') }}
                        {{ __('auth.verify.not') }}, <a
                            href="{{ route('verification.resend') }}">{{ __('auth.verify.click') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
