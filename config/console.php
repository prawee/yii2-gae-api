<?php
/**
 * @Author: Prawee Wongsa <prawee.w@integra8t.com>
 * @Date: 10/25/2017 AD 8:24 AM
 */
$db = require(__DIR__.'/db.php');

$config = [
    'id' => 'i8-console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'i8\commands',
    'aliases' => [
        '@i8' => dirname(__DIR__),
        '@bower' => dirname(__DIR__).'/vendor/bower-asset'
    ],
    'components' => [
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ]
    ]
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
