<?php
return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],   
    'teacher' => [
        'driver' => 'sanctum',
        'provider' => 'teachers',
    ],
    'parent' => [
        'driver' => 'sanctum',
        'provider' => 'parents',
    ],
    'admin' => [
        'driver' => 'sanctum',
        'provider' => 'admins',
    ],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\Models\User::class,
    ],
    'teachers' => [
        'driver' => 'eloquent',
        'model' => App\Models\Teacher::class,
    ],
    'parents' => [
        'driver' => 'eloquent',
        'model' => App\Models\Parents::class,
    ],
    /* 'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ], */
],
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'password_timeout' => 10800
];
