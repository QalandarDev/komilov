<?php

namespace common\widgets;


use common\models\LoginForm;
use Yii;
use yii\bootstrap5\Widget;

class LoginWidget extends Widget
{
    final public function run(): string
    {
        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
            return $this->render('login', [
                'model' => $model
            ]);
        } else {
            return $this->render('profile', [
                'model' => Yii::$app->user->identity
            ]);
        }
    }
}