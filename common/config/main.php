<?php
return [
    'language' => 'ru-RU',
    'timeZone' => 'Europe/Moscow',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
        ],
        'formatter' => [
            'class' => \yii\i18n\Formatter::class,
            'defaultTimeZone' => 'UTC',
            'timeZone' => 'Europe/Moscow',
        ],
    ],

    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableFlashMessages' => false,
            'enableRegistration' => true,
            'admins' => ['admin'],
        ],
    ],
];
