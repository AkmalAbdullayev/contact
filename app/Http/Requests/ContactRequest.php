<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255', 'unique:contacts'],
            'email' => ['required', 'email', 'unique:emails'],
            'number' => ['required', 'numeric', 'unique:mobile_numbers']
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'full name',
            'email' => 'email address',
            'mobile' => 'phone number'
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'A :attribute is required.',
            'full_name.min' => 'A :attribute must contain 3 characters.'
        ];
    }
}
