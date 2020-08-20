<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RaffleFormRequest extends FormRequest
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
	    'name' => 'required|string|max:100',
            'benefactor' => 'required|string|max:100',
            'description' => 'required|string',
            'begin_date' => 'date',
            'end_date' => 'date|after:'.$this->begin_date,
            'ticket_cost' => 'numeric|max:255|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'end_date.after' => 'End Date must be a date after Begin Date'
        ];
    }
}
