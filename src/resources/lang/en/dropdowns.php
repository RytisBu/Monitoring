<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'deleted' => [
        '' => '',
        0 => 'No',
        1 => 'yes'
    ],
    'complaints_status' => [
        ''              => '',
        'Registered'    => 'Registered',
        'Solving'       => 'Solving',
        'Resolved'      => 'Resolved',
        'Spam'          => 'Spam',
        'Inform Client' => 'Inform client'
    ],
    'status' => [
        '' => '',
        'Active' => 'Active',
        'Inactive' => 'Inactive'
    ],
    'language' => [
        '' => '',
        'LT' => 'Lithuania',
        'EN' => 'English'
    ],
    'user_type' => [
        '' => '',
        0 => 'Regular user',
        1 => 'System Administrator'
    ],
    'priority' => [
        ''         => '',
        'Critical' => 'Critical',
        'Normal'   => 'Normal',
        'Low'      => 'Low'
    ],
    'category' => [
        ''                   => '',
        'System not working' => 'System not working',
        'Need permissions'   => 'Need permissions',
        'Found bug'          => 'Found bug',
        'API'                => 'API',
        'Other'              => 'Other'
    ]
];
