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
        'dashboard' => '',
        'prefix' => 'admin',
    ],

    'category' => [
        'index' => 'categories',
        'create' => 'categories/create',
        'show' => 'category/{category}',
        'edit' => 'category/{category}/edit',
        'destroy' => 'category/{category}/delete',
    ],

    'post' => [
        'index' => 'posts',
        'create' => 'posts/create',
        'show' => 'posts/{post}',
        'edit' => 'posts/{post}/edit',
        'destroy' => 'posts/{post}/delete',
    ],
];
