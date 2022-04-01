<?php

namespace App\Http\Services\Systems;

use Illuminate\Http\Request;

class System
{
    public static function denormalizeData(Request $request)
    {
        $system = new System();

        foreach($request->all() as $row => $value) {
            if ($row !== 'page') {
                $system->$row = $value;
            }
        }

        return $system;
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
}
