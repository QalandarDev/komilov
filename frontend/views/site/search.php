<?php
/** @var \yii\data\ActiveDataProvider $dataProvider */

use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var string $category
 * @var string $subject
 */
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="subject-view">
    <div class="row">
        <?php $form = ActiveForm::begin([
            'action' => ['site/search'],
            'method' => 'get',
            'options' => [
                'class' => 'd-flex justify-content-center',
            ],

        ]); ?>
        <?php echo $form->field($model, 'search', [
            'options' => [
                'class' => 'input-group mb-3'
            ]
        ])->textInput(['placeholder'=>'Qidiruv uchun'])->label(false) ?>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Qidirish</button>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
    <?= GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                [
                    'format' => 'raw',
                    'value' => function ($model) {

                        return '

 
            <div class="card-body">
<h6 class="card-title mb-0 mt-0">
<i class="fas fa-file-check fa-lg ml-2" style="color: #0084ff;"></i>
<a href="' . Url::to(['site/view', 'slug' => $model->slug,]) . '">' . $model->name . '</a>
</h6>
 
        </div>';
                    }
                ]
            ]
        ]
    ) ?>

</section>