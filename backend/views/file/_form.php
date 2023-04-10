<?php

use common\models\Category;
use common\models\Subjects;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var common\models\Documents $model */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->widget(FileInput::class, [
        'options' => ['accept' => 'file/*'],
        'pluginOptions' => [
            'showUpload' => false,
            'showRemove' => false,
            'overwriteInitial' => false,
            'maxFileSize' => 102400,
            'browseLabel' => 'Faylni tanlang',
        ]
    ]) ?>

    <?= $form->field($model, 'image')->widget(FileInput::class,[
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showUpload' => false,
            'showRemove' => false,
            'overwriteInitial' => false,
            'maxFileSize' => 102400,
            'browseLabel' => 'Rasmni tanlang',
        ]
    ]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'category_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name_uz'),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'subject_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(Subjects::find()->all(), 'id', 'name_uz'),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
