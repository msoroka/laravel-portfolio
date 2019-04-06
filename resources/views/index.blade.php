@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <h1>{{ __('homepage.welcome') }}</h1>
    {{ bcrypt("test1234") }}
@endsection
