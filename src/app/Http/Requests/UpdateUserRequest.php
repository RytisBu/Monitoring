<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name'           => 'required|min:2',
            'last_name'            => 'required|min:2',
            'email'                => 'required|email|unique:users,email',
            'new_password'         => 'max:100|min:6',
            'repeate_new_password' => 'same:new_password|max:100|min:6',
            'language'             => 'required',
            'phone_mobile'         => 'min:8|max:8',
        ];
    }
}
