<?php

/** @var yii\web\View $this
 * @var string $category
 */

use common\widgets\SubjectWidget;

?>

<div class="card subjects-navigation">
    <div class="card-body d-none d-sm-block">
        <div class="row">
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

