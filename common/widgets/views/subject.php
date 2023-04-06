<?php


/**
 * @var $subjects Subjects[]|array|ActiveRecord[]
 */

use common\models\Category;
use common\models\Documents;
use common\models\Subjects;
use yii\bootstrap5\Html;
use yii\db\ActiveRecord;

?>
<div class="card-body d-none d-sm-block">
    <div class="row ">
        <?php foreach ($subjects as $subject): ?>
            <div class="mb-1 col-sm-6 col-md-4 d-grid">
                <?php
                $badge='';
                if(Yii::$app->request->get('category')!==null){

                    $count= Documents::find()->where(['subject_id'=>$subject->id,
                        'category_id'=> Category::find()->where(['slug'=>Yii::$app->request->get('category')])->one()?->id
                    ])->count();

                    $badge=($count>0)?Html::tag('span',$count,['class'=>'badge bg-primary']):'';
                }

                echo Html::a(
                    $subject->name_uz.$badge,
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
