<?php
/**
 * @Author: Prawee Wongsa <prawee@integra8t.com>
 * @Date: 10/19/2017 AD 4:32 PM
 */
namespace i8\modules\v1\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'i8\models\User';

    public function actions()
    {
        $actions = parent::actions();
        unset(
            $actions['index'],
            $actions['view'],
            $actions['create'],
            $actions['update'],
            $actions['delete']
        );
        return $actions;
    }

    public function actionIndex()
    {
        return ['message' => 'list all users'];
    }
}