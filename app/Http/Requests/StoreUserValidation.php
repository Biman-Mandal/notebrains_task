<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserValidation extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'phone' => 'required|unique:users|digits:10|integer',
            'address' => 'required',
            'password' => 'required|min:6|required_with:retype_password|same:retype_password',
        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Enter a valid address',
        ];
    }
}
