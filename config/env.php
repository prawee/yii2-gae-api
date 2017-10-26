<?php
/**
 * @Author: Prawee Wongsa <prawee.w@integra8t.com>
 * @Date: 10/25/2017 AD 3:37 PM
 */
if (empty($_SERVER['APPLICATION_ID'])) {
    (new \Dotenv\Dotenv(dirname(__DIR__)))->load();
}

defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') === 'true');
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ?: 'prod');