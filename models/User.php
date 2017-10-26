<?php
/**
 * @Author: Prawee Wongsa <prawee.w@integra8t.com>
 * @Date: 10/19/2017 AD 4:51 PM
 */
namespace i8\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName()
    {
        return '{{user}}';
    }
}