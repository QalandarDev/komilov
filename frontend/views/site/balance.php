<?php
/* @var $this View */
/* @var $user User */
/* @var $user User */
/* @var $transactions \common\models\Transaction[] */

/* @var $transaction \common\models\Transaction */

use common\models\User;
use yii\web\View;

?>
<style>

    .card {
        border-radius: 10px;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #337ab7;
        color: #ffffff;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    .card-body {
        padding: 10px;
    }

    .card-text {
        font-size: 16px;
    }

    .list-group {
        margin-bottom: 0;
    }

    .list-group-item {
        border-radius: 0;
        padding: 10px 15px;
        font-size: 16px;
    }

    .list-group-item i {
        margin-right: 10px;
    }

    .balance-currency {
        font-size: 16px;
        text-align: end;
    }
</style>
<div class="card">
    <div class="card-header">
        <span class="text-left">Joriy Balans</span>
        <span class="balance-currency" style="float: right"><?= $user->balanceAsDecimal() ?> UZS</span>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <?php foreach ($transactions as $transaction): ?>
                <li class="list-group-item <?= $transaction->getLiClass() ?>">
                    <?= $transaction->getIcon() ?>
                    <?= $transaction->message ?>
                    <b> <?= $transaction->getCost() ?> UZS </b>
                    <span style="float: right"><?= $transaction->time ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>