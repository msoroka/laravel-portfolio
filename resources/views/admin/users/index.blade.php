@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Users
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-bordered table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Birth</th>
                    <th scope="col">Localization</th>
                    <th scope="col">Role</th>
                    <th class="fit" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th class="align-middle" scope="row">{{ $user->id }}</th>
                        <th class="align-middle" scope="row">{{ $user->full_name }}</th>
                        <th class="align-middle" scope="row">{{ $user->email }}</th>
                        <th class="align-middle" scope="row">{{ $user->phone }}</th>
                        <th class="align-middle" scope="row">{{ $user->birth_date->format('Y-m-d') }}</th>
                        <th class="align-middle" scope="row">{{ sprintf('%s, %s', $user->city, $user->country) }}</th>
                        <th class="align-middle" scope="row">{{ $user->role ? $user->role->name : 'None' }}</th>
                        <th class="align-middle fit" scope="row">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">
                                <span data-feather="edit"></span>
                                Edit
                            </a>
                            @if(Auth::user()->id != $user->id)
                                <button class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                                     document.getElementById('user-destroy').submit();">
                                    <span data-feather="trash-2"></span>
                                    Delete
                                </button>
                                <form id="user-destroy" method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                      onclick="return confirm('Are you sure?');">
                                    {{ method_field('delete') }}
                                    @csrf
                                </form>
                            @endif
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a class="btn btn-dark" href="{{ route('admin.users.create') }}">
                <span data-feather="plus"></span>
                Add new user
            </a>
        </div>
    </div>
@endsection
