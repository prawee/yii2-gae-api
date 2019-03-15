<?php
/**
 * @Author: Prawee Wongsa <prawee.w@integra8t.com>
 * @Date: 10/19/2017 AD 2:59 PM
 */
$db = require(__DIR__.'/db.php');
$params = require(__DIR__.'/params.php');

return [
    'id' => 'i8-api-gae',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'i8\controllers',
    'aliases' => [
        '@i8' => dirname(__DIR__),
    ],
    'modules' => [
        'v1' => [
            'class' => 'i8\modules\v1\ApiModule'
        ]
    ],
    'bootstrap' => ['log'],
    'components' => [
        'db' => $db,
        'user' => [
            'identityClass' => 'i8\models\Auth',
            'enableSession' => false,
            'loginUrl' => null
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
                        'v1/user'
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
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\SyslogTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\MemCache',
            'useMemcached' => true
        ]
    ],
    'params' => $params
];
