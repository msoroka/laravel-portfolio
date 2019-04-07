@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Edit Role
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-dark" href="{{ route('admin.roles.index') }}">
                <span data-feather="arrow-left"></span>
                Go back
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="text-center">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <p class="h4 mb-4">Edit Role</p>
                @include('admin.roles.form')
            </form>
        </div>
    </div>
@endsection
