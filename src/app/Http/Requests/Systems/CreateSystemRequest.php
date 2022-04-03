<?php

namespace App\Http\Requests\Systems;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Services\Users\User AS UserService;

class CreateSystemRequest extends FormRequest
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
        $serializedUsersIds = UserService::getSerializedUsersIds();

        return [
            'name'             => 'required|min:2|max:100',
            'assigned_user_id' => 'required|in:'.$serializedUsersIds,
            'status'           => 'required|in:Active,Inactive',
            'description'      => 'max:255',
        ];
    }
}
