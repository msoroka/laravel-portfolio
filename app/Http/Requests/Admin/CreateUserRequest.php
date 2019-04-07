<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Role;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|alpha_dash|string|max:50',
            'last_name'  => 'required|alpha_dash|string|max:50',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|confirmed',
            'birth_date' => 'required|date',
            'phone'      => 'required|string|max:15',
            'city'       => 'required|string|max:15',
            'country'    => 'required|string|max:15',
            'role_id'    => 'required|integer',
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $role_id = $this->input('role_id');

            if (!Role::all()->contains($role_id)) {
                $validator->errors()->add(
                    'role_id',
                    'Roles doesnt exists',
                );
            }
        });
    }
}
