<div class="row">
    <div class="col-md-6 mb-4">
        <input id="name" name="name" type="text"
               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               value="{{ isset($social) ? $social->name : old('name') }}"
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
               value="{{ isset($social) ? $social->link : old('link') }}" placeholder="Link"
               required>
        @if ($errors->has('link'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
        @endif
    </div>
</div>

@isset($social)
    <div class="row">
        <div class="col-md-12 mb-4">
            <img class="img-fluid img-thumbnail" src="{{ asset('images/' . $social->logo) }}" alt="{{ $social->name }}">
        </div>
    </div>
@endisset

<div class="row">
    <div class="col-md-12 mb-4">
        <input id="logo" name="logo" type="file" class="form-control-file {{ $errors->has('logo') ? ' is-invalid' : '' }}"
               placeholder="Logo" value="{{ isset($social) ? $social->logo : old('logo') }}">
        @if ($errors->has('logo'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
        @endif
    </div>
</div>

<button class="btn btn-dark btn-block" type="submit">Submit</button>
