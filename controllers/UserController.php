<?php
/**
 * @Author: Prawee Wongsa <prawee@integra8t.com>
 * @Date: 10/19/2017 AD 4:32 PM
 */
namespace i8\controllers;

use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'i8\models\User';
}