<div class="row">
    <div class="col-md-6 mb-4">
        <input id="name" name="name" type="text"
               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               value="{{ isset($experience) ? $experience->name : old('name') }}"
               placeholder="Name" required>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-6 mb-4">
        <input id="position" name="position" type="text"
               class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}"
               value="{{ isset($experience) ? $experience->position : old('position') }}" placeholder="Position"
               required>
        @if ($errors->has('position'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('position') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-4">
        <input id="responsibilities" name="responsibilities" type="text"
               class="form-control{{ $errors->has('responsibilities') ? ' is-invalid' : '' }}"
               value="{{ isset($experience) ? $experience->responsibilities : old('responsibilities') }}"
               placeholder="Responsibilities" required>
        @if ($errors->has('responsibilities'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('responsibilities') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-4">
        <input id="address" name="address" type="text"
               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
               value="{{ isset($experience) ? $experience->address : old('address') }}"
               placeholder="Address" required>
        @if ($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
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
               value="{{ isset($experience) ? $experience->date_from : old('date_from') }}"
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
               value="{{ isset($experience) ? $experience->date_to : old('date_to') }}"
               placeholder="Date To">
        @if ($errors->has('date_to'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_to') }}</strong>
                            </span>
        @endif
    </div>
</div>


@isset($experience)
    <div class="row">
        <div class="col-md-12 mb-4">
            <img class="img-fluid img-thumbnail" src="{{ asset('logos/' . $experience->logo) }}"
                 alt="{{ $experience->name }}">
        </div>
    </div>
@endisset

<div class="row">
    <div class="col-md-12 mb-4">
        <input id="logo" name="logo" type="file"
               class="form-control-file {{ $errors->has('logo') ? ' is-invalid' : '' }}"
               placeholder="Image" value="{{ isset($experience) ? $experience->logo : old('logo') }}">
        @if ($errors->has('logo'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
        @endif
    </div>
</div>

<button class="btn btn-dark btn-block" type="submit">Submit</button>
