@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <h1>{{ __('homepage.welcome') }}</h1>
    {{ bcrypt("test1234") }}
    {{ \App\User::first()->isAdmin() }}

    @admin
        <p>test</p>
    @endadmin
@endsection
