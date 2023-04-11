<?php

use common\models\Category;
use common\models\Subjects;
use common\widgets\ListFilesWidget;
/**
 * @var yii\web\View $this
 * @var string $category
 * @var string $subject
 */
$this->title= Subjects::name($subject);
$this->params['breadcrumbs'][] = ['label' => Category::name($category)??'All', 'url' => ['index','category' => $category]];
$this->params['breadcrumbs'][] = $this->title;
try {
    echo ListFilesWidget::widget([
        'category' => $category,
        'subject' => $subject,
    ]);
} catch (Throwable|Exception $e) {
    echo $e->getMessage();
}
?>
