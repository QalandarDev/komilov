<?php
/**
 * @var $this View
 * @var $subject string
 * @var $category string
 */

use common\models\Category;
use common\models\Documents;
use common\models\Subjects;
use yii\bootstrap5\Html;
use yii\data\ArrayDataProvider;
use yii\web\View;

$files = Documents::find()
    ->andFilterWhere(['subject_id' => Subjects::find()->where(['slug' => $subject])->one()?->id])
    ->andFilterWhere(['category_id' => Category::find()->where(['slug' => $category])->one()?->id])
    ->all();

$dataProvider = new ArrayDataProvider([
    'allModels' => $files,
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<section class="subject-view"><!---->
    <div class="card document"><!----><!---->
        <div class="card-body"><!----><!----><h6 class="card-title m-0"><i
                        class="icofont-2x mr-2 icofont-file-word"></i><a
                        href="/uz/documents/kurs-ishlari/algebra/parametrga-bog-liq-integrallar" class=""
                        target="_self">Parametrga bog’liq integrallar</a></h6></div><!----><!----></div>
    <div class="card document"><!----><!---->
        <div class="card-body"><!----><!----><h6 class="card-title m-0"><i
                        class="icofont-2x mr-2 icofont-file-word"></i><a
                        href="/uz/documents/kurs-ishlari/algebra/o-quvchilarda-masala-yechish-uquvini-shakllantirish"
                        class="" target="_self">O'quvchilarda masala yechish uquvini shakllantirish</a></h6></div>
        <!----><!----></div>
    <div class="card document"><!----><!---->
        <div class="card-body"><!----><!----><h6 class="card-title m-0"><i
                        class="icofont-2x mr-2 icofont-file-word"></i><a
                        href="/uz/documents/kurs-ishlari/algebra/miqdorlarning-nisbiy-bog-liqligiga-doir-masalalar-ustida-ishlash"
                        class="" target="_self">Miqdorlarning nisbiy bog’liqligiga doir masalalar ustida ishlash</a>
            </h6></div><!----><!----></div>
    <div class="card document"><!----><!---->
        <div class="card-body"><!----><!----><h6 class="card-title m-0"><i
                        class="icofont-2x mr-2 icofont-file-word"></i><a
                        href="/uz/documents/kurs-ishlari/algebra/koshi-tengsizligi-va-uning-tadbiqlari" class=""
                        target="_self">Koshi tengsizligi va uning tadbiqlari</a></h6></div><!----><!----></div><!---->
</section>