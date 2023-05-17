<?php
/* @var $this View */
/* @var $user User */

use common\models\User;
use yii\web\View;

?>
<style>
    body {
        font-family: sans-serif;
        background-color: #ffffff;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
    }

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

    .list-group-item .float-right {
        float: right;
    }

    .balance-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .balance-amount {
        font-size: 24px;
        font-weight: bold;
    }

    .balance-currency {
        font-size: 16px;
    }
</style>
<h1>Balance View</h1>
<div class="balance-container">
    <div class="balance-amount"><?= $user->balance ?></div>
    <div class="balance-currency">UZS</div>
</div>
<div class="card">
    <div class="card-header">
        Transactions
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <i class="fas fa-arrow-right"></i> Deposit $100.00
                <span class="float-right">12/05/2023</span>
            </li>
            <li class="list-group-item">
                <i class="fas fa-arrow-left"></i> Withdrawal $50.00
                <span class="float-right">12/06/2023</span>
            </li>
        </ul>
    </div>
</div>