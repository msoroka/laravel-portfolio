<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    : array
    {
        return [
            'first_name' => 'required|alpha_dash|string|max:50',
            'last_name'  => 'required|alpha_dash|string|max:50',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|confirmed|min:8',
            'birth_date' => 'required|date',
            'phone'      => 'required|string|max:15',
            'city'       => 'required|string|max:15',
            'country'    => 'required|string|max:15',
        ];
    }
}
