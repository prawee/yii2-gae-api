<?php
/**
 * @Author: Prawee Wongsa <prawee.w@integra8t.com>
 * @Date: 11/16/2017 AD 1:26 PM
 */
$frameworkPath = dirname(__FILE__) . '/../vendor/yiisoft/yii2';

require_once($frameworkPath . '/requirements/YiiRequirementChecker.php');
$requirementsChecker = new YiiRequirementChecker();

$gdMemo = $imagickMemo = 'Either GD PHP extension with FreeType support or ImageMagick PHP extension with PNG support is required for image CAPTCHA.';
$gdOK = $imagickOK = false;

if (extension_loaded('imagick')) {
    $imagick = new Imagick();
    $imagickFormats = $imagick->queryFormats('PNG');
    if (in_array('PNG', $imagickFormats)) {
        $imagickOK = true;
    } else {
        $imagickMemo = 'Imagick extension should be installed with PNG support in order to be used for image CAPTCHA.';
    }
}

if (extension_loaded('gd')) {
    $gdInfo = gd_info();
    if (!empty($gdInfo['FreeType Support'])) {
        $gdOK = true;
    } else {
        $gdMemo = 'GD extension should be installed with FreeType support in order to be used for image CAPTCHA.';
    }
}

/**
 * Adjust requirements according to your application specifics.
 */
$requirements = array(
    // Database :
    array(
        'name' => 'PDO extension',
        'mandatory' => true,
        'condition' => extension_loaded('pdo'),
        'by' => 'All DB-related classes',
    ),
    array(
        'name' => 'PDO SQLite extension',
        'mandatory' => false,
        'condition' => extension_loaded('pdo_sqlite'),
        'by' => 'All DB-related classes',
        'memo' => 'Required for SQLite database.',
    ),
    array(
        'name' => 'PDO MySQL extension',
        'mandatory' => false,
        'condition' => extension_loaded('pdo_mysql'),
        'by' => 'All DB-related classes',
        'memo' => 'Required for MySQL database.',
    ),
    array(
        'name' => 'PDO PostgreSQL extension',
        'mandatory' => false,
        'condition' => extension_loaded('pdo_pgsql'),
        'by' => 'All DB-related classes',
        'memo' => 'Required for PostgreSQL database.',
    ),
    // Cache :
    array(
        'name' => 'Memcache extension',
        'mandatory' => false,
        'condition' => extension_loaded('memcache') || extension_loaded('memcached'),
        'by' => '<a href="http://www.yiiframework.com/doc-2.0/yii-caching-memcache.html">MemCache</a>',
        'memo' => extension_loaded('memcached') ? 'To use memcached set <a href="http://www.yiiframework.com/doc-2.0/yii-caching-memcache.html#$useMemcached-detail">MemCache::useMemcached</a> to <code>true</code>.' : ''
    ),
    // CAPTCHA:
    array(
        'name' => 'GD PHP extension with FreeType support',
        'mandatory' => false,
        'condition' => $gdOK,
        'by' => '<a href="http://www.yiiframework.com/doc-2.0/yii-captcha-captcha.html">Captcha</a>',
        'memo' => $gdMemo,
    ),
    array(
        'name' => 'ImageMagick PHP extension with PNG support',
        'mandatory' => false,
        'condition' => $imagickOK,
        'by' => '<a href="http://www.yiiframework.com/doc-2.0/yii-captcha-captcha.html">Captcha</a>',
        'memo' => $imagickMemo,
    ),
    // PHP ini :
    'phpExposePhp' => array(
        'name' => 'Expose PHP',
        'mandatory' => false,
        'condition' => $requirementsChecker->checkPhpIniOff("expose_php"),
        'by' => 'Security reasons',
        'memo' => '"expose_php" should be disabled at php.ini',
    ),
    'phpAllowUrlInclude' => array(
        'name' => 'PHP allow url include',
        'mandatory' => false,
        'condition' => $requirementsChecker->checkPhpIniOff("allow_url_include"),
        'by' => 'Security reasons',
        'memo' => '"allow_url_include" should be disabled at php.ini',
    ),
    'phpSmtp' => array(
        'name' => 'PHP mail SMTP',
        'mandatory' => false,
        'condition' => strlen(ini_get('SMTP')) > 0,
        'by' => 'Email sending',
        'memo' => 'PHP mail SMTP server required',
    ),
);

// OPcache check
if (!version_compare(phpversion(), '5.5', '>=')) {
    $requirements[] = array(
        'name' => 'APC extension',
        'mandatory' => false,
        'condition' => extension_loaded('apc'),
        'by' => '<a href="http://www.yiiframework.com/doc-2.0/yii-caching-apccache.html">ApcCache</a>',
    );
}

$requirementsChecker->checkYii()->check($requirements)->render();
