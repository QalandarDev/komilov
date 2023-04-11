<?php
/**
 * @var $this View
 * @var $subject string
 * @var $category string
 */

use common\models\Category;
use common\models\Documents;
use common\models\Subjects;
use yii\data\ArrayDataProvider;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\View;

$files = Documents::find()
    ->andFilterWhere(['subject_id' => Subjects::find()->where(['slug' => $subject])->one()?->id])
    ->andFilterWhere(['category_id' => Category::find()->where(['slug' => $category])->one()?->id])
    ->all();

$dataProvider = new ArrayDataProvider([
    'allModels' => $files,
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<section class="subject-view">
    <?php foreach ($dataProvider->getModels() as $model): ?>
        <div class="card document mt-2 mb-2">
            <div class="card-body">
                <h6 class="card-title mb-0 mt-0">
                    <i class="fas fa-file-check fa-lg ml-2" style="color: #0084ff;"></i>
                    <a href="<?= Url::to(['site/view', 'slug' => $model->slug,]) ?>" class="" target="_self">
                        <?= $model->name ?>
                    </a>
                </h6>
            </div>
        </div>
    <?php endforeach; ?>
</section>