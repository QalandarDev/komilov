<?php

namespace common\widgets;


use common\models\LoginForm;
use yii\bootstrap5\Widget;

class LoginWidget extends Widget
{
    public function run()
    {
        $model = new LoginForm();
        return $this->render('login', [
            'model' => $model
        ]);
    }
}