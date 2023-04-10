<?php


namespace common\widgets;


use yii\base\Widget;

class ViewFileWidget extends Widget
{
    final public function run(): string
    {
        return $this->render('view_file');
    }
}