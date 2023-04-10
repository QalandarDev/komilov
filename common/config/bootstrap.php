<?php

use yii\helpers\VarDumper;

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(__DIR__, 2) . '/frontend');
Yii::setAlias('@backend', dirname(__DIR__, 2) . '/backend');
Yii::setAlias('@console', dirname(__DIR__, 2) . '/console');
Yii::setAlias('@file', dirname(__DIR__, 2) . '/files');
Yii::setAlias('@image', dirname(__DIR__, 2) . '/images');
function dd(...$varibles)
{
    foreach ($varibles as $varible) {
        VarDumper::dump($varible, 10, true);
    }
    die();

}

function __(string $msg, array $params = []): string
{
    return Yii::t('app', $msg, $params);
}