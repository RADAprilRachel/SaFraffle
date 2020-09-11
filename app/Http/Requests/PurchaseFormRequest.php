<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseFormRequest extends FormRequest
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
            'contact_data.customer_name' => 'required|string|max:200',
            'contact_data.customer_email' => 'email',
	    'contact_data.customer_phone' => 'string',
            'contact_data.contact_method' => 'required|string',
        ];
    }
    public function messages()
    {   
        return [
            'contact_data.customer_name.max' => 'Must not be longer than 200 characters',
            'contact_data.customer_email.email' => 'Must be a valid email address',
            'contact_data.customer_phone.string' => 'Entry for phone number required'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json(['success'=>false,'errors'=>$validator->errors()], 422));
    }
}
