@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Edit Social
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <a class="btn btn-dark" href="{{ route('admin.socials.index') }}">
                <span data-feather="arrow-left"></span>
                Go back
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{ route('admin.socials.update', $social) }}" class="text-center" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <p class="h4 mb-4">Edit Social</p>
                @include('admin.socials.form')
            </form>
        </div>
    </div>
@endsection
