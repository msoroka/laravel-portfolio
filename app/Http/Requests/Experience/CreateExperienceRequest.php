<?php

namespace App\Http\Requests\Experience;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateExperienceRequest extends FormRequest
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
            'name'             => 'required|string|max:255',
            'position'         => 'required|string|max:255',
            'responsibilities' => 'required|string|max:255',
            'address'          => 'required|string|max:255',
            'date_from'        => 'required|date',
            'date_to'          => 'nullable|date',
            'logo'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * @param $validator
     */
    public function withValidator($validator)
    : void {
        $validator->after(function ($validator) {
            $dateFrom = Carbon::createFromFormat('Y-m-d', $this->input('date_from'));

            if ($this->input('date_to')) {
                $dateTo = Carbon::createFromFormat('Y-m-d', $this->input('date_to'));

                if ($dateTo->lessThan($dateFrom)) {
                    $validator->errors()->add(
                        'date_to',
                        'Date to cant be past by date from.'
                    );
                }
            }
        });
    }
}
