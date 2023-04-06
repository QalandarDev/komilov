<?php

namespace common\widgets;

use common\models\Category;
use yii\base\Widget;

final class CategoryWidget extends Widget
{
    public function run(): string
    {
        $categories = Category::find()->all();
        return $this->render('category', [
            'categories' => $categories
        ]);
    }
}