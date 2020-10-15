<?php

return [
    'welcome' => '',
    'dashboard' => 'panel',
    'login' => 'giris',
    'logout' => 'cikis',
    'register' => 'kayit',

    'password' => [
        'request' => 'sifre/sifirla',
        'email' => 'sifre/e-posta',
        'reset' => 'sifre/sifirla/{token}',
        'update' => 'sifre/sifirla',
        'confirm' => 'sifre/onayla',
        'confirmation' => 'kullanici/sifre-dogrulama-durumu',
    ],

    'verification' => [
        'notice' => 'e-posta/dogrula',
        'verify' => 'e-posta/dogrula/{id}/{hash}',
        'resend' => 'e-posta/yeniden-gonder',
    ],

    'two-factor' => [
        'login' => 'iki-adimli-dogrulama'
    ],

    'profile' => [
        'show' => '/kullanıcı/profili',
    ],
    'api-tokens' => [
        'index' => '/kullanıcı/api-tokens',
    ],
    'teams' => [
        'create' => '/takim/create',
        'show' => '/takim/{team}',
    ],
    'current-team' => [
        'update' => '/simdiki-takim',
    ],

    'admin' => [
        'prefix' => 'yonetim',
    ],

    'post' => [
        'index' => 'posts',
        'create' => 'posts/yeni',
        'show' => 'post/{post}',
        'edit' => 'post/{post}/duzenle',
        'destroy' => 'post/{post}/sil',
    ],

    'category' => [
        'post' => [
            'index' => 'kategori/{category}/posts',
            'create' => 'kategori/{category}/posts/yeni',
            'show' => 'kategori/{category}/post/{post}',
            'edit' => 'kategori/{category}/post/{post}/duzenle',
            'destroy' => 'kategori/{category}/post/{post}/sil',
        ],
    ]
];
