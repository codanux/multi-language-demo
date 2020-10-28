<?php

/*
 * You can place your custom package configuration in here.
 */

return [
    'locales' => [
        'en' => 'English',
        'tr' => 'Türkçe'
    ],

    'default_locale' => 'en',

    'default_prefix' => false,

    'router' => [
        'fortify' => [
            'routes' => true,
        ],

        'jetstream' => [
            'routes' => true,
            'stack' => config('jetstream.stack', 'livewire'),
        ],
    ],

    'middleware' => [
        'web' => [
            \Codanux\MultiLanguage\DetectRequestLocale::class
        ]
    ],

    'media' => [
        'translations_detect' => true, // translations all detect
        'locale' => 'en', // first look locale
        'media_repository' => 'Spatie\MediaLibrary\MediaCollections\MediaRepository',
    ],

];
