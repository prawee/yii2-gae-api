<?php
/**
 * @Author: Prawee Wongsa <prawee@integra8t.com>
 * @Date: 10/19/2017 AD 2:51 PM
 */
define('YII_DEBUG', true);
define('YII_ENV', 'dev');

/*
 * Load vendor and dependencies
 */
require(__DIR__.'/../vendor/autoload.php');

/**
 * Load Yii class
 */
require(__DIR__.'/../vendor/yiisoft/yii2/Yii.php');

/**
 * Load configure
 */
$config = require __DIR__.'/../config.php';

/**
 * New Instance
 */
(new \yii\web\Application($config))->run();

