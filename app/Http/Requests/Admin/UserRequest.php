<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'usertype' => 'required',
            'name' => ['required', 'string'],
            'username' => ['required', 'string'],
            'email' => 'required|email|max:255|i|unique:users',
            'password' => 'required|min:6|confirmed',

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'usertype.required' => 'Please select usertype!',
            'name.required' => 'Please enter name!',
            'username.required' => 'Please select brand name !',
            'email.required' => 'Please enter email',
            'password.required' => 'Please enter password'
        ];
    }
}
