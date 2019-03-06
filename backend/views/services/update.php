<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Services */

$this->title = 'Update Services: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$statusBtn = Html::a('Включить', ['update-status', 'id' => $model->id], [
    'class' => 'btn btn-success',
    'data' => [
        'method' => 'post',
    ],
]);

if($model->status){
    $statusBtn = Html::a('Выключить', ['update-status', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Вы действительно хотите выключить услугу?',
            'method' => 'post',
        ],
    ]);
}
?>
<div class="services-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= $statusBtn?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
