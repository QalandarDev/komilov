<?php

namespace common\widgets;


use common\models\Subjects;
use yii\bootstrap5\Widget;

final class SubjectWidget extends Widget
{

    public string $category='';
    /**
     * @return string
     */
    final public function run():string
    {
        $subjects = Subjects::find()->all();
        return $this->render('subject',
            [
                'subjects' => $subjects,
                'category' => $this->category,
            ]);
    }
}