<?php

namespace App\Http\Requests\Social;

use Illuminate\Foundation\Http\FormRequest;

class CreateSocialRequest extends FormRequest
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
            'name' => 'required|string|max:50|unique:socials',
            'link' => 'required|string|max:255|unique:socials',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
