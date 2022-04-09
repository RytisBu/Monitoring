<?php

namespace App\Http\Services\Complaints;

use Illuminate\Http\Request;

class Complaint
{
    public static function denormalizeData(Request $request)
    {
        $complaint = new Complaint();

        foreach($request->all() as $row => $value) {
            if ($row !== 'page') {
                $complaint->$row = $value;
            }
        }

        return $complaint;
    }

    public static function filter(array $data)
    {
        $conditionsArray = array();

        foreach($data as $row => $value){
            if (!empty($value) && !in_array($row, ['page', 'orderType', 'sort', '_token', 'records_display'])) {
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
