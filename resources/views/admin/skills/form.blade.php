<div class="row">
    <div class="col-md-12 mb-4">
        <input id="name" name="name" type="text"
               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               value="{{ isset($skill) ? $skill->name : old('name') }}"
               placeholder="Name" required>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-4">
        <textarea id="description" name="description"
                  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                  placeholder="Description"
                  required>{{ isset($skill) ? $skill->description : old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
        @endif
    </div>
</div>

@isset($skill)
    <div class="row">
        <div class="col-md-12 mb-4">
            <img class="img-fluid img-thumbnail" src="{{ asset('images/' . $skill->image) }}" alt="{{ $skill->name }}">
        </div>
    </div>
@endisset

<div class="row">
    <div class="col-md-12 mb-4">
        <input id="image" name="image" type="file"
               class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}"
               placeholder="Logo" value="{{ isset($skill) ? $skill->image : old('image') }}">
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
        @endif
    </div>
</div>

<button class="btn btn-dark btn-block" type="submit">Submit</button>
