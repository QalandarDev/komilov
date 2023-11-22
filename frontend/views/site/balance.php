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



    .card-header {
        background-color: #337ab7;
        color: #ffffff;
        /*padding: 10px;*/
        /*font-size: 18px;*/
        /*font-weight: bold;*/
    }


    .list-group {
        margin-bottom: 0;
    }
    .balance-currency {
        font-size: 16px;
        text-align: end;
    }
</style>
<div class="card">
    <div class="card-header">
        <span class="text-left">Joriy Balans Hisobni to'ldirish uchun Telegram orqali <a style="color:yellow; border: 2px solid white" href='https://texnolog2024.t.me'>@texnolog2024</a></span>
        <span class="balance-currency" style="float: right;"><?= $user->balanceAsDecimal() ?> UZS</span>
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
