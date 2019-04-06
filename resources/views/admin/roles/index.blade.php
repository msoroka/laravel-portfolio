@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Roles
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-bordered table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th class="fit" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <th class="align-middle" scope="row">{{ $role->id }}</th>
                        <th class="align-middle" scope="row">{{ $role->name }}</th>
                        <th class="align-middle" scope="row">{{ $role->slug }}</th>
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
