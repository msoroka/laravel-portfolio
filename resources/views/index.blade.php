@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include('_partials.menu')
    @include('parts.showcase')
    @include('parts.skills')
@endsection
