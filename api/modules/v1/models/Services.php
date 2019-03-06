<?php
/**
 * Created by PhpStorm.
 * User: fedornabilkin
 * Date: 06.03.2019
 * Time: 23:01
 */

namespace api\modules\v1\models;

use common\models\Services as CommonServices;

class Services extends CommonServices
{
    public function fields()
    {
        return [
            'id',
            'name',
            'code',
            'price',
            'description',
            'status',
            'expiration_date',
            'city' => function ($model) {
                return $model->city->name;
            }
        ];
    }
}