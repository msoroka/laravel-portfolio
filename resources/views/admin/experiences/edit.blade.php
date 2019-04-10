@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Edit Experience
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-dark" href="{{ route('admin.experiences.index') }}">
                <span data-feather="arrow-left"></span>
                Go back
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{ route('admin.experiences.update', $experience) }}" class="text-center"
                  enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <p class="h4 mb-4">Edit Experience</p>
                @include('admin.experiences.form')
            </form>
        </div>
    </div>
@endsection
