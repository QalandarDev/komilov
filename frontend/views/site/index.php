<?php

/** @var yii\web\View $this
 * @var string $category
 * @var \common\models\Documents $model
 */

use common\widgets\SubjectWidget;
use yii\bootstrap5\ActiveForm;

?>

<div class="card subjects-navigation">
    <div class="card-body d-sm-block">
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
            <?php try {
                echo SubjectWidget::widget(
                    [
                        'category' => $category,
                    ]
                );
            } catch (Exception|Throwable $e) {
                echo $e->getMessage();
            }
            ?>
        </div>
    </div>
</div>

