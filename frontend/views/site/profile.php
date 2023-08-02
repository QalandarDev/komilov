<?php

use yii\bootstrap5\Html;

$model = new \common\models\User();
Html::beginForm(
    ['site/profile'],
    'post',
    ['enctype' => 'multipart/form-data']
);

echo Html::textInput('password', $model->password_hash, ['class' => 'form-control']);

echo Html::endForm();
?>