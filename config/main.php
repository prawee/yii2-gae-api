<?php
/**
 * @Author: Prawee Wongsa <prawee@integra8t.com>
 * @Date: 10/19/2017 AD 2:59 PM
 */
return [
    'id' => 'i8-api-gae',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'i8\controllers',
    'aliases' => [
        '@i8' => dirname(__DIR__),
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=<dbname>',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8'
        ],
        'user' => [
            'identityClass' => 'i8\models\Auth',
            'enableAutoLogin' => true
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'site' => 'site',
                        'user'
                    ]
                ]
            ]
        ],
        'request' => [
            'baseUrl' => '',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser'
            ]
        ],
        'response' => [
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG,
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
                ]
            ]
        ]
    ]
];
