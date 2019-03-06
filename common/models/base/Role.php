<?php
/**
 * Created by PhpStorm.
 * User: fedornabilkin
 * Date: 06.03.2019
 * Time: 20:51
 */

namespace common\models\base;


class Role extends \yii\rbac\Role
{
    CONST TYPE_ROLE_ADMIN = 'admin';
    CONST TYPE_ROLE_OPERATOR = 'operator';

    public static function hasRole($name)
    {
        return \Yii::$app->user->can($name);
    }
}