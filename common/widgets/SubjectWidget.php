<?php

namespace common\widgets;


use common\models\Subjects;
use yii\bootstrap5\Widget;

final class SubjectWidget extends Widget
{
    public function run()
    {
        $subjects = Subjects::find()->all();
        return $this->render('subject',
            [
                'subjects' => $subjects,
            ]);
    }
}