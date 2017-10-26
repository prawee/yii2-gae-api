<?php
/**
 * @Author: Prawee Wongsa <prawee.w@integra8t.com>
 * @Date: 10/19/2017 AD 2:51 PM
 */

/*
 * Load vendor and dependencies
 */
require(__DIR__.'/../vendor/autoload.php');

/**
 * Load environment variable
 */
require(__DIR__ . '/../config/env.php');

/**
 * Load Yii class
 */
require(__DIR__.'/../vendor/yiisoft/yii2/Yii.php');

/**
 * Load configure
 */
$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__.'/../config/main.php'),
    require(__DIR__.'/../config/main-local.php')
);

/**
 * New Instance
 */
(new \yii\web\Application($config))->run();

