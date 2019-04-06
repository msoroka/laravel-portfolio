<div class="row">
    <div class="col-md-6 mb-4">
        <input id="first_name" name="first_name" type="text"
               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
               value="{{ isset($user) ? $user->first_name : old('first_name') }}"
               placeholder="First name" required>
        @if ($errors->has('first_name'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-6 mb-4">
        <input id="last_name" name="last_name" type="text"
               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
               value="{{ isset($user) ? $user->last_name : old('last_name') }}" placeholder="Last name"
               required>
        @if ($errors->has('last_name'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <input id="email" name="email" type="email"
               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
               value="{{ isset($user) ? $user->email : old('email') }}" placeholder="E-mail" required>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
        @endif
    </div>
    <div class="col-md-6 mb-4">
        <input id="phone" name="phone" type="text"
               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
               value="{{ isset($user) ? $user->phone : old('phone') }}" placeholder="Phone" required>
        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <input id="password" name="password" type="password"
               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
               value="{{ isset($user) ? $user->first_name : old('first_name') }}" placeholder="Password">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-6 mb-4">
        <input id="password_confirmation" name="password_confirmation" type="password"
               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
               placeholder="Password confirmation">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-6  mb-4">
        <input id="city" name="city" type="text"
               class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
               value="{{ isset($user) ? $user->city : old('city') }}" placeholder="City" required>
        @if ($errors->has('city'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-6  mb-4">
        <input id="country" name="country" type="text"
               class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
               value="{{ isset($user) ? $user->country : old('country') }}" placeholder="Country"
               required>
        @if ($errors->has('country'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <select id="role_id" name="role_id"
                class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}"
                placeholder="Role" required>
            <option value="" disabled>Select role</option>
            @foreach($roles as $role)
                <option
                    value="{{ $role->id }}" {{ isset($user) && $role->id == $user->role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('role_id'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('role_id') }}</strong>
                            </span>
        @endif
    </div>

    <div class="col-md-6  mb-4">
        <input id="birth_date" name="birth_date" type="date"
               class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}"
               value="{{ isset($user) ? $user->birth_date->format('Y-m-d') : old('birth_date') }}"
               placeholder="Country"
               required>
        @if ($errors->has('birth_date'))
            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('birth_date') }}</strong>
                            </span>
        @endif
    </div>
</div>

<button class="btn btn-dark btn-block" type="submit">Submit</button>
