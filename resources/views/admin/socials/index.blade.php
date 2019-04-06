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
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.socials.edit', $social) }}">
                                <span data-feather="edit"></span>
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                                 document.getElementById('social-destroy').submit();">
                                <span data-feather="trash-2"></span>
                                Delete
                            </button>
                            <form id="social-destroy" method="POST" action="{{ route('admin.socials.destroy', $social) }}"
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
            <a class="btn btn-dark" href="{{ route('admin.socials.create') }}">
                <span data-feather="plus"></span>
                Add new social
            </a>
        </div>
    </div>
@endsection
