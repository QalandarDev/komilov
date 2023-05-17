<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;
use common\widgets\CategoryWidget;
use common\widgets\LoginWidget;
use common\widgets\SubjectWidget;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-lg-12">
                <div id="rtb-top"></div>
            </div>
            <aside class="col-lg-3">
                <!--                Login/Profile widget        -->
                <?php try {
                    echo LoginWidget::widget();
                } catch (Throwable $e) {
                    echo $e->getMessage();
                } ?>
                <!--                Category widget              -->
                <?php
                try {
                    echo CategoryWidget::widget();
                } catch (Throwable $e) {
                    echo $e->getMessage();
                }
                ?>
                <div id="rtb-side"></div>
            </aside>
            <div class="col-lg-9">
                <!--                Breadcrumbs section         -->
                <section class="main-breadcrumb p-1">
                    <?php if (!empty($this->params['breadcrumbs'])): ?>
                        <?php try {
                            echo Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);
                        } catch (Throwable $e) {
                        } ?>
                    <?php endif ?>
                </section>
                <!--                Content Section              -->
                <?= $content ?>
            </div>
        </div>

    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
