@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Socials
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-bordered table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Link</th>
                    <th class="fit" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($socials as $social)
                    <tr>
                        <th class="align-middle" scope="row">{{ $social->id }}</th>
                        <th class="align-middle" scope="row">{{ $social->name }}</th>
                        <th class="align-middle" scope="row">{{ $social->link }}</th>
                        <th class="align-middle fit" scope="row">
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
