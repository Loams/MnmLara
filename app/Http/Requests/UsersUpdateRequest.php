<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|max:255',
            'law_id' => 'required|integer',
            'society_id' => 'required|integer',
            'oldpassword' => 'sometimes|min:6',
            'newpassword' => 'sometimes|min:6|confirmed',
            'photo' => 'required|max:200',
        ];
    }
}
