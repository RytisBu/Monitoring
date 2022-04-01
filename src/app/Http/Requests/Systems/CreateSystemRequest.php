<?php

namespace App\Http\Requests\Systems;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

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
        $serializedUsersIds = '';
        $users = User::where('status', '=', 'Active')->get();
        foreach ($users as $row => $user) {
            if ($row == 0) {
                $serializedUsersIds = $user->id;
            } else {
                $serializedUsersIds = $serializedUsersIds . ', ' . $user->id;
            }
        }

        return [
            'name'             => 'required|min:2|max:100',
            'assigned_user_id' => 'required|in:'.$serializedUsersIds,
            'status'           => 'required|in:Active,Inactive',
            'description'      => 'max:255',
        ];
    }
}
