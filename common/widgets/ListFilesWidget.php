<?php

namespace common\widgets;


use common\models\Category;
use common\models\Subjects;
use yii\base\Widget;
use yii\web\NotFoundHttpException;

class ListFilesWidget extends Widget
{
    public string $category;
    public string $subject;

    /**
     */
    final public function run(): string
    {
        return $this->render('list_files', [
            'category' => $this->category,
            'subject' => $this->subject,
        ]);
    }
}