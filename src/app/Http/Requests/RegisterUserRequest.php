<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name'      => 'required|max:30|min:2',
            'last_name'       => 'required|max:30|min:2',
            'email'           => 'required|email|unique:users,email',
            'language'        => 'required',
            'password'        => 'required|max:100|min:6',
            'repeat_password' => 'required|same:password|max:100|min:6',
            'description'     => 'max:255',
        ];
    }
}
