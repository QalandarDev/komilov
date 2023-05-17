<?php

use kartik\touchspin\TouchSpin;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->widget(\kartik\select2\Select2::class,[
        'data' => [
            $model::STATUS_ACTIVE => 'Active',
            $model::STATUS_INACTIVE => 'Inactive',
        ],
        'options' => [
            'placeholder' => 'Select a status ...',
        ],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]) ?>

    <?= $form->field($model, 'balance')->widget(TouchSpin::class, [
        'options' => ['placeholder' => 'Enter balance...'],
        'pluginOptions' => [
            'min' => 0,
            'max' => 1000000,
            'step' => 1000,
            'separator' => ' ',
            'postfix' => 'so\'m',
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
