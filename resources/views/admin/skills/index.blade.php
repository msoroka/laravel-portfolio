@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Skills
@endsection

@section('content')
    <p class="h4 mb-4 text-center">All Skills</p>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-bordered table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th class="fit" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($skills as $skill)
                    <tr>
                        <th class="align-middle" scope="row">{{ $skill->id }}</th>
                        <th class="align-middle" scope="row">{{ $skill->name }}</th>
                        <th class="align-middle fit" scope="row"><img style="width: 100px"
                                                                      src="{{ asset('images/' . $skill->image) }}"
                                                                      alt="{{ $skill->name }}"></th>
                        <th class="align-middle fit" scope="row">
                            <a class="btn btn-primary btn-sm"
                               href="{{ route('admin.skills.edit', $skill) }}">
                                <span data-feather="edit"></span>
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                document.getElementById('skill-destroy{{ $skill->id }}').submit();">
                                <span data-feather="trash-2"></span>
                                Delete
                            </button>
                            <form id="skill-destroy{{ $skill->id }}" method="POST"
                                  action="{{ route('admin.skills.destroy', $skill) }}"
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
            <a class="btn btn-dark" href="{{ route('admin.skills.create') }}">
                <span data-feather="plus"></span>
                Add new skill
            </a>
        </div>
    </div>
@endsection
