<?php

/**
 * @var $this View
 * @var $categories Category[]|array|ActiveRecord[]
 */

use common\models\Category;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\web\View;

?>
<div class="card list-group border-primary">
    <?php foreach ($categories as $category) {
        $class=(Yii::$app->request->get('category')==$category->slug)?'list-group-item text-center list-group-item-action active':'list-group-item text-center list-group-item-action';
        echo Html::a(
            $category->name_uz
            .' <span class="badge rounded-pill bg-success">'.$category->getDocuments()->count().'</span>',
            ['site/index', 'category' => $category->slug],
            ['class' => $class]
        );
    }
    ?>
    <?= Html::a(
        Yii::t('app', 'All'),
        ['site/index'],
        ['class' => 'list-group-item text-center list-group-item-action'.(Yii::$app->request->get('category')==null?' active':'')]
    ) ?>

</div>