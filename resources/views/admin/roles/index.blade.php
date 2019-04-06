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
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', $role) }}">
                                <span data-feather="edit"></span>
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                                 document.getElementById('role-destroy').submit();">
                                <span data-feather="trash-2"></span>
                                Delete
                            </button>
                            <form id="role-destroy" method="POST" action="{{ route('admin.roles.destroy', $role) }}"
                                  onclick="return confirm('Are you sure?');">
                                {{ method_field('delete') }}
                                @csrf
                            </form>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a class="btn btn-dark" href="{{ route('admin.roles.create') }}">
                <span data-feather="plus"></span>
                Add new role
            </a>
        </div>
    </div>
@endsection
