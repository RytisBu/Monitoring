<?php

namespace App\Http\Services\Users;

use App\Models\User AS UserModel;

class User
{
    public static function getSerializedUsersIds()
    {
        $serializedUsersIds = '';
        $users              = UserModel::where('status', 'Active')->get();

        foreach ($users as $row => $user) {
            if ($row == 0) {
                $serializedUsersIds = $user->id;
            } else {
                $serializedUsersIds = $serializedUsersIds . ', ' . $user->id;
            }
        }

        return $serializedUsersIds;
    }
}
