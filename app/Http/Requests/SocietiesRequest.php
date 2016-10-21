<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocietiesRequest extends FormRequest
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
            'name' => 'required|unique:societies',
            'siret' => 'required|unique:societies',
            'address' => 'required',
            'cp' => 'required',
            'city' => 'required',
        ];
    }
}
