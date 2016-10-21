<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketsRequest extends FormRequest
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
            'title' => 'required|max:250',
            'date_resolution' => 'date',
            'create_by' => 'required|integer',
            'treat_by' => 'integer',
            'category_id' => 'integer',
            'priority_id' => 'integer',
            'status_id' => 'integer',
            'solved' => 'integer',
        ];
    }
}
