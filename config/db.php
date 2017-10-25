<?php
/**
 * @Author: Prawee Wongsa <prawee@integra8t.com>
 * @Date: 10/25/2017 AD 12:43 PM
 */
return [
    'class' => 'yii\db\Connection',
    'dsn' => getenv('MYSQL_DSN'),
    'username' => getenv('MYSQL_USERNAME'),
    'password' => getenv('MYSQL_PASSWORD'),
    'charset' => 'utf8'
];