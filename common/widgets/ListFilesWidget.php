<?php

namespace common\widgets;


class ListFilesWidget extends \yii\base\Widget
{
    public string $category;
    public string $subject;

    public function run()
    {
        return $this->render('list_files', [
            'category' => $this->category,
            'subject' => $this->subject,
        ]);
    }
}