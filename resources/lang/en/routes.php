<?php

return [
    'welcome' => '',
    'dashboard' => 'dashboard',
    'login' => 'login',
    'logout' => 'logout',
    'register' => 'register',

    'password.request' => 'forgot-password',
    'password.email' => 'forgot-password',
    'password.reset' => 'reset-password/{token}',
    'password.update' => 'reset-password',
    'password.confirm' => 'user/confirm-password',
    'password.confirmation' => 'user/confirmed-password-status',
    'user-password.update' => 'user/password',

    'verification.notice' => 'email/verify',
    'verification.verify' => 'email/verify/{id}/{hash}',
    'verification.send' => 'email/verification-notification',

    'two-factor.login' => 'two-factor-challenge',
    'user.two-factor' => 'user/two-factor-authentication',
    'user.qr-code' => 'user/two-factor-qr-code',
    'user.two-factor.recovery' => 'user/two-factor-recovery-codes',


    'profile' => [
        'show' => '/user/profile',
    ],
    'api-tokens' => [
        'index' => '/user/api-tokens',
    ],
    'teams' => [
        'create' => '/teams/create',
        'show' => '/teams/{team}',
    ],
    'current-team' => [
        'update' => '/current-team',
    ],

    'admin' => [
        'prefix' => 'admin',
    ],

    'post' => [
        'index' => 'posts',
        'create' => 'posts/create',
        'show' => 'posts/{post}',
        'edit' => 'posts/{post}/edit',
        'destroy' => 'posts/{post}/delete',
    ],

    'category' => [
        'post' => [
            'index' => 'category/{category}/posts',
            'create' => 'category/{category}/posts/create',
            'show' => 'category/{category}/posts/{post}',
            'edit' => 'category/{category}/posts/{post}/edit',
            'destroy' => 'category/{category}/posts/{post}/delete',
        ],
    ]
];
