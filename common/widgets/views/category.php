<?php

/**
 * @var $this View
 * @var $categories Category[]|array|ActiveRecord[]
 * @var $requestCategory string
 */

use common\models\Category;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\web\View;
$isAll = ($requestCategory == 'all')? ' active' : '';
?>
<div class="card list-group border-primary category-nav-item">
    <?php foreach ($categories as $category) {
        $class = ($requestCategory == $category->slug) ? 'list-group-item text-left list-group-item-action active' : 'list-group-item text-left list-group-item-action';
        echo Html::a(
            $category->name_uz
            . ' <span class="badge rounded-pill bg-success" >' . $category->getDocuments()->count() . '</span>',
            ['site/index', 'category' => $category->slug],
            ['class' => $class]
        );
    }
    ?>
    <?= Html::a(
        Yii::t('app', 'All'),
        ['site/index', 'category' => 'all'],
        ['class' => 'list-group-item text-left list-group-item-action'.$isAll]
    ) ?>

</div>