<?php


/** @var $model \common\models\User */

use yii\bootstrap5\Html;

$url = Yii::$app->request->url;
?>
<div class="card user-panel border-danger mb-3">
    <div class="card-header bg-danger text-white text-center">
        <i class="fas fa-user"></i>
        <span class="align-middle">
            <?= $model->username ?>
        </span>
    </div>
    <div class="list-group user-actions list-group-flush">

        <?=
        Html::a(
            '<i class="far fa-file-alt"></i> Mening Fayllarim',
            ['/site/files'],
            ['class' => ($url==='/site/files')?'list-group-item  bg-warning':'list-group-item ', 'target' => '_self']
        )
        ?>
        <?=
        Html::a(
            '<i class="far fa-sack-dollar"></i> Balans',
            ['/site/balance'],
            ['class' => ($url==='/site/balance')?'list-group-item  bg-warning':'list-group-item ', 'target' => '_self']
        )
        ?>
        <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
        . Html::submitButton(
            '<i class="far fa-sign-out mr-2"></i> Chiqish',
            ['class' => 'btn list-group-item user-action list-group-item-action']
        )
        . Html::endForm();
        ?>
    </div>
</div>