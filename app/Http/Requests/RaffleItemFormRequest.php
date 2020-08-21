<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RaffleItemFormRequest extends FormRequest
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
            'donor' => 'required|string|max:100',
            'description' => 'string',
            'value' => 'required|numeric|min:0|max:9999.99',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
