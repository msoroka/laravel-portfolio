<div class="row">
    <div class="col-md-6 mb-4">
        <input id="name" name="name" type="text"
               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               value="{{ isset($project) ? $project->name : old('name') }}"
               placeholder="Name" required>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-6 mb-4">
        <input id="link" name="link" type="text"
               class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}"
               value="{{ isset($project) ? $project->link : old('link') }}" placeholder="Link"
               required>
        @if ($errors->has('link'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-4">
        <textarea id="description" name="description"
                  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                  placeholder="Description"
                  required>{{ isset($project) ? $project->description : old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-6  mb-4">
        <label for="date_from" class="col-form-label">
            Date From
        </label>
        <input id="date_from" name="date_from" type="date"
               class="form-control{{ $errors->has('date_from') ? ' is-invalid' : '' }}"
               value="{{ isset($project) ? $project->date_from->format('Y-m-d') : old('date_from') }}"
               placeholder="Date From"
               required>
        @if ($errors->has('date_from'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_from') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-6  mb-4">
        <label for="date_to" class="col-form-label">
            Date To
        </label>
        <input id="date_to" name="date_to" type="date"
               class="form-control{{ $errors->has('date_to') ? ' is-invalid' : '' }}"
               value="{{ isset($project) ? $project->date_to->format('Y-m-d') : old('date_to') }}"
               placeholder="Date To">
        @if ($errors->has('date_to'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_to') }}</strong>
                            </span>
        @endif
    </div>
</div>


@isset($project)
    <div class="row">
        <div class="col-md-12 mb-4">
            <img class="img-fluid img-thumbnail" src="{{ asset('images/' . $project->image) }}"
                 alt="{{ $project->name }}">
        </div>
    </div>
@endisset

<div class="row">
    <div class="col-md-12 mb-4">
        <input id="image" name="image" type="file"
               class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}"
               placeholder="Image" value="{{ isset($project) ? $project->image : old('image') }}">
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
        @endif
    </div>
</div>

<button class="btn btn-dark btn-block" type="submit">Submit</button>
