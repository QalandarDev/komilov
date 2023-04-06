<?php

use common\models\LoginForm;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\web\View;


/* @var $this View */
/* @var $model LoginForm */
?>
<div class="card user-panel border-danger unauthorized mb-3">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'validateOnBlur' => false,
        'fieldConfig' => [
            'template' => "{input}\n{error}",
            'inputOptions' => ['class' => 'form-control'],
            'options' => ['class' => 'p-2']
        ],
    ]); ?>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username']) ?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>
    <div class="d-grid gap-2 p-2">
        <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-danger text-center', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
