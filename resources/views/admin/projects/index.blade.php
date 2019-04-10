@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Projects
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
                    <th scope="col fit">Date From</th>
                    <th scope="col fit">Date To</th>
                    <th class="fit" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <th class="align-middle" scope="row">{{ $project->id }}</th>
                        <th class="align-middle" scope="row">{{ $project->name }}</th>
                        <th class="align-middle" scope="row"><a target="_blank"
                                                                href="{{ $project->link }}">{{ $project->link }}</a>
                        </th>
                        <th class="align-middle" scope="row">{{ $project->date_from }}</th>
                        <th class="align-middle" scope="row">{{ $project->date_to }}</th>
                        </th>
                        <th class="align-middle fit" scope="row">
                            <a class="btn btn-primary btn-sm"
                               href="{{ route('admin.projects.edit', $project) }}">
                                <span data-feather="edit"></span>
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                document.getElementById('project-destroy{{ $project->id }}').submit();">
                                <span data-feather="trash-2"></span>
                                Delete
                            </button>
                            <form id="project-destroy{{ $project->id }}" method="POST"
                                  action="{{ route('admin.projects.destroy', $project) }}"
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
            <a class="btn btn-dark" href="{{ route('admin.projects.create') }}">
                <span data-feather="plus"></span>
                Add new project
            </a>
        </div>
    </div>
@endsection
