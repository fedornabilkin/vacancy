<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'expiration_date')->widget(DateTimePicker::class, [
        'language' => 'ru',
        'size' => 'ms',
        'template' => '{input}',
        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd HH:ii P',
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'city_id')->dropDownList($model->getCitiesForSelect(), ['prompt' => 'Выберите город']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
