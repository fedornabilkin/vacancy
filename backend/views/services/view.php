<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Services */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="services-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'price',
            'description:ntext',
            'status',
            'expiration_date',
            [
                'label' => Yii::t('app', 'City'),
                'format' => 'raw',
                'value' => function ($data){
                    return $data->city->name;
                }
            ],
        ],
    ]) ?>

    <h2>History</h2>


    <?= GridView::widget([
        'dataProvider' => $historyProvider,
        'filterModel' => [],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'attr',
            'val',
            [
                'label' => Yii::t('app', 'Created By'),
                'format' => 'raw',
                'value' => function ($data){
                    return $data->user->username;
                }
            ],
            [
                'label' => Yii::t('app', 'Created At'),
                'value' => function($data){
                    return date('d.m.y H:i:s', $data->created_at);
                }
            ],
        ],
    ]); ?>

</div>
