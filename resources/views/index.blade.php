@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @include('_partials.menu')
    @include('parts.showcase')
    @include('parts.skills')
    @include('parts.experience')
    @include('parts.projects')
    @include('parts.others')
    @include('parts.contact')
@endsection
