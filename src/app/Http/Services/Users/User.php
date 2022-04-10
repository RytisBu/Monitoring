<?php

namespace App\Http\Services\Users;

use App\Models\User AS UserModel;
use Illuminate\Http\Request;

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

    public static function sortBy($orderBy)
    {
        return $orderBy ? $orderBy : 'created_at';
    }

    public static function sortType($orderType)
    {
        if ($orderType === 'ASC') {
            $orderType = 'DESC';
        } elseif ($orderType === 'DESC') {
            $orderType = 'ASC';
        }

        return $orderType ? $orderType : 'DESC';
    }

    public static function denormalizeData(Request $request)
    {
        $user = new UserModel();

        foreach($request->all() as $row => $value) {
            if ($row !== 'page') {
                $user->$row = $value;
            }
        }

        return $user;
    }

    public static function filter(array $data)
    {
        $conditionsArray = array();

        foreach($data as $row => $value){
            if (!empty($value) && !in_array($row, ['page', 'orderType', 'sort', '_token'])) {
                if (in_array($row, ['created_at', 'updated_at'])) {
                    array_push($conditionsArray, [$row, '>=', $value]);
                } else {
                    array_push($conditionsArray, [$row, '=', $value]);
                }
            }
        }

        return $conditionsArray;
    }
}
