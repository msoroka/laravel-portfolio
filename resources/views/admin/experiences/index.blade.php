@extends('layouts.admin')

@section('title')
    {{ __('nav.brand') }} - Experiences
@endsection

@section('content')
    <p class="h4 mb-4 text-center">All Experiences</p>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-bordered table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col fit">Date From</th>
                    <th scope="col fit">Date To</th>
                    <th class="fit" scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($experiences as $experience)
                    <tr>
                        <th class="align-middle" scope="row">{{ $experience->id }}</th>
                        <th class="align-middle" scope="row">{{ $experience->name }}</th>
                        <th class="align-middle" scope="row">{{ $experience->position }}</th>
                        <th class="align-middle" scope="row">{{ $experience->date_from }}</th>
                        <th class="align-middle" scope="row">{{ $experience->date_to }}</th>
                        </th>
                        <th class="align-middle fit" scope="row">
                            <a class="btn btn-primary btn-sm"
                               href="{{ route('admin.experiences.edit', $experience) }}">
                                <span data-feather="edit"></span>
                                Edit
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                document.getElementById('experience-destroy{{ $experience->id }}').submit();">
                                <span data-feather="trash-2"></span>
                                Delete
                            </button>
                            <form id="experience-destroy{{ $experience->id }}" method="POST"
                                  action="{{ route('admin.experiences.destroy', $experience) }}"
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
            <a class="btn btn-dark" href="{{ route('admin.experiences.create') }}">
                <span data-feather="plus"></span>
                Add new experience
            </a>
        </div>
    </div>
@endsection
