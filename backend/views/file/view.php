<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Documents $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="documents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'slug',
            'name',
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->file, ['../site/download', 'slug' => $model->slug]);
                }
            ],
            'image',
            'downloads:integer',
            'views:integer',
            'status',
            [
                'attribute' => 'category_id',
                'label' => 'Category',
                'value' => $model->category->name_uz,
            ],
            [
                'attribute' => 'subject_id',
                'value' => $model->subject->name_uz,
                'label' => 'Subject',
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
