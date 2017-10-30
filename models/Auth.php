<?php
/**
 * @Author: Prawee Wongsa <prawee.w@integra8t.com>
 * @Date: 10/30/2017 AD 9:48 PM
 */
namespace i8\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Auth extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return '{{auth}}';
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->token;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}