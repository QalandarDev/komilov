<?php
/**
 * @var $this yii\web\View
 * @var $content string
 * @var $model common\models\Documents
 */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => $model->category->name_uz, 'url' => ['index', 'category' => $model->category->slug]];
$this->params['breadcrumbs'][] = ['label' => $model->subject->name_uz, 'url' => ['list', 'category' => $model->category->slug, 'subject' => $model->subject->slug]];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="card document">
    <div class="card-body">
        <h4 class="card-title">
            <?= $this->title ?>
        </h4>
        <div class="row text-muted text-right">
            <div class="col-md-3 col-sm-6">
                <p class="mb-1">
                    <i class="fa fa-clock text-primary"></i>
                    Yuklangan vaqt:
                </p>
                <h5><?= $model->uploadTime ?></h5>
            </div>
            <div class="col-md-2 col-sm-6">
                <p class="mb-1">
                    <i class="fas fa-download text-success"></i>
                    Ko'chirishlar:
                </p>
                <h5>
                    <?= $model->downloads ?>
                </h5>
            </div>
            <div class="col-md-2 col-sm-6">
                <p class="mb-1">
                    <i class="fas fa-hdd text-danger"></i>
                    Hajmi:
                </p>
                <h5>
                    <?= $model->fileSize ?>
                </h5>
            </div>
            <div class="col-md-2 col-sm-6">
                <p class="mb-1">
                    <i class="fas fa-tag text-info"></i>
                    Narxi:
                </p>
                <div class="product-price h5">
                    <?= Yii::$app->formatter->asDecimal($model->price) ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <a target="_self"
                   href="<?= $model->fileLink ?>"
                   class="btn btn-info btn-block text-white">
                    <i class="fas fa-download "></i>
                    Yuklab olish
                </a>
            </div>
        </div>
    </div>
    <div text-variant="white" class="card-body document-preview bg-body-tertiary"
         style="
         height: 480px;
         overflow-y: auto;
            overflow-x: hidden;
">
        <img
            src="<?= $model->imageLink ?>"
            width="100%"
            class="document-page album">

    </div>
</div>
