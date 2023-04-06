<?php


/**
 * @var $subjects Subjects[]|array|ActiveRecord[]
 */

use common\models\Subjects;
use yii\bootstrap5\Html;
use yii\db\ActiveRecord;

?>
<div class="card-body d-none d-sm-block">
    <div class="row ">
        <?php foreach ($subjects as $subject): ?>
            <div class="mb-1 col-sm-6 col-md-4 d-grid">
                <?= Html::a(
                    $subject->name_uz,
                    ['site/index',
                        'subject' => $subject->slug,
                        'category' => Yii::$app->request->get('category')
                    ],

                    ['class' => 'btn btn-rounded btn-outline-primary btn-block align-middle',
                        'title' => $subject->name_uz,
                        'target' => '_self',
                    ]
                ) ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
