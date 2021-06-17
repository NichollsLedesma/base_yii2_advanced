<?php

use yii\log\FileTarget;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        "log" => [
            "traceLevel" => YII_DEBUG ? 3 : 0,
            "targets" => [
                [
                    "class" => FileTarget::class,
                    "levels" => ["error", "warning"]
                ]
            ],
        ],
        'redis' => [
            'class' => \yii\redis\Connection::class,
            'hostname' => 'redis',
            'port' => 6379,
            'retries' => 1,
        ],
        'cache' => [
            'class' => yii\redis\Cache::class,
            'redis' => [
                'hostname' => 'redis',
                'port' => 6379,
                'database' => 0,
            ]
        ],
        'session' => [
            'class' => yii\redis\Session::class,
            'redis' => [
                'hostname' => 'redis',
                'port' => 6379,
                'database' => 1,
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'port' => '1025',
                'host' => 'mail'
            ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        // 'mqtt' => [
        //     'class' => common\components\MqttComponent::class,
        //     'host' => 'rabbitmq',
        //     'port' => 1883
        // ]
    ],
];
