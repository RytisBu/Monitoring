<?php

namespace App\Http\Requests\Complaints;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Services\Users\User AS UserService;
use App\Http\Services\Systems\System AS SystemService;

class CreateComplaintRequest extends FormRequest
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
        $serializedUsersIds      = UserService::getSerializedUsersIds();
        $getSerializedSystemsIds = SystemService::getSerializedSystemsIds();

        return [
            'name'             => 'required|min:2|max:100',
            'assigned_user_id' => 'required|in:' . $serializedUsersIds,
            'status'           => 'required|in:Registered,Solving,Resolved,Spam,Inform client',
            'priority'         => 'required|in:Critical,Normal,Low',
            'category'         => 'required|in:System not working,Need permissions,Found bug,API,Other',
            'system_id'        => 'required|in:' . $getSerializedSystemsIds,
            'description'      => 'max:255',
        ];
    }
}
