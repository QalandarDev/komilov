<?php

use common\models\Category;
use common\models\Subjects;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use kartik\touchspin\TouchSpin;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var common\models\Documents $model */
?>

<div class="documents-form container">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'class' => 'form-horizontal'
        ]
    ]); ?>
    <div class="row">
        <div class="col-sm-4 col-md-6">
            <?= $form->field($model, 'name', [
                'addon' => [
                    'prepend' => [
                        'content' => '<i class="fa fa-book" aria-hidden="true"></i>'
                    ]
                ],
            ])->textInput(['maxlength' => true]); ?>
        </div>
        <div class="col-sm-4 col-md-6">
            <?= $form->field($model, 'price')->widget(TouchSpin::class, [
                'options' => ['placeholder' => 'Enter price...'],
                'pluginOptions' => [
                    'min' => 0,
                    'max' => 1000000,
                    'step' => 1000,
                    'separator' => ' ',
                    'postfix' => 'so\'m',
                ]
            ]); ?>
        </div>
        <div class="col-sm-4 col-md-6">
            <?= $form->field($model, 'file')->widget(FileInput::class, [
                'pluginOptions' => [
                    'initialPreview' => [
                        $model->file ? $model->fileAdminLink: null,
                    ],
                    'initialPreviewAsData' => true,
                    'initialPreviewConfig' => [
                        ['caption' => $model->file ?: null],
                    ],
                    'showUpload' => false,
                    'showRemove' => false,
                    'maxFileSize' => 102400,
                    'browseLabel' => 'Faylni tanlang',

                ]
            ]) ?>
        </div>
        <div class="col-sm-4 col-md-6">
            <?= $form->field($model, 'image')->widget(FileInput::class, [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'initialPreview' => [
                        $model->image ? $model->imageAdminLink: null,
                    ],
                    'initialPreviewAsData' => true,
                    'initialPreviewConfig' => [
                        ['caption' => $model->image ?: null],
                    ],
                    'showUpload' => false,
                    'showRemove' => false,
                    'maxFileSize' => 102400,
                    'browseLabel' => 'Rasmni tanlang',
                ]
            ]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'status')->widget(SwitchInput::class, [
                'pluginOptions' => [
                    'onText' => 'Aktiv',
                    'offText' => 'Passiv',
                ]
            ]) ?>
        </div>
        <div class="col-5">
            <?= $form->field($model, 'category_id')->widget(Select2::class, [
                'data' => ArrayHelper::map(Category::find()->all(), 'id', 'name_uz'),
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-5">
            <?= $form->field($model, 'subject_id')->widget(Select2::class, [
                'data' => ArrayHelper::map(Subjects::find()->all(), 'id', 'name_uz'),
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="d-grid">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
