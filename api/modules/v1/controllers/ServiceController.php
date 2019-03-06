<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\Services;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;


class ServiceController extends ActiveController
{
    public $modelClass = Services::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update'], $actions['delete'], $actions['create']);

        $actions['index']['prepareDataProvider'] = function ($action) {
            return new ActiveDataProvider([
                'query' => $this->modelClass::find()->where('status=:status', [':status' => $this->modelClass::STATUS_ENABLED]),
            ]);
        };

        return $actions;
    }

    public function actionCity($id)
    {
        $query = $this->modelClass::find()
            ->where('status=:status', [':status' => $this->modelClass::STATUS_ENABLED])
            ->andWhere(['city_id' => $id]);
        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}
