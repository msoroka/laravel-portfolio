<div class="row">
    <div class="col-md-6 mb-4">
        <input id="name" name="name" type="text"
               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               value="{{ isset($role) ? $role->name : old('name') }}"
               placeholder="Name" required>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-6 mb-4">
        <input id="slug" name="slug" type="text"
               class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
               value="{{ isset($role) ? $role->slug : old('slug') }}" placeholder="Slug"
               required>
        @if ($errors->has('slug'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
        @endif
    </div>
</div>

<button class="btn btn-dark btn-block" type="submit">Submit</button>
