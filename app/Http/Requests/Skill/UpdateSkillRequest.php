<?php

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillRequest extends FormRequest
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
            'name'        => 'required|string|max:50|unique:skills,name,'.$this->skill->id.',id',
            'description' => 'required|string',
            'color'       => 'required|string',
            'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
