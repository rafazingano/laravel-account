<?php

return [
    'plan_default' => 1,
    'site' => [
        'layout' => env('CW_LAYOUT', 'layouts.app'),
        'views' => env('CW_VIEWS', 'account::'),
    ],
    'admin' => [
        'layout' => env('CW_ADMIN_LAYOUT', 'layouts.app'),
        'views' => env('CW_ADMIN_VIEWS', 'account::'),
    ]
];
