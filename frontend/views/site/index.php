<?php

/** @var yii\web\View $this */

use common\widgets\CategoryWidget;
use common\widgets\LoginWidget;
use common\widgets\SubjectWidget;

$this->title = 'My Yii Application';
?>

<div class="card subjects-navigation"><!----><!---->
    <div tabindex="0" aria-label="Loading" class="vld-overlay is-active" style="display: none;">
        <div class="vld-background"></div>
        <div class="vld-icon">
            <svg viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" width="40" height="40" stroke="#394757">
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)" stroke-width="2">
                        <circle stroke-opacity=".25" cx="18" cy="18" r="18"></circle>
                        <path d="M36 18c0-9.94-8.06-18-18-18">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18"
                                              to="360 18 18" dur="0.8s"
                                              repeatCount="indefinite"></animateTransform>
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="card-body d-none d-sm-block"><!----><!---->
        <div class="row">
            <!--                    if request not have subject and category-->
            <?php
            $request = Yii::$app->request;
            //            dd($request->get());
            if (($request->get('category') === null || $request->get('subject') === null)) {
                echo SubjectWidget::widget();
            }
            ?>
        </div>
    </div>
</div>
<?php if ($request->get('category') !== null && $request->get('subject') !== null) {
    echo \common\widgets\ListFilesWidget::widget([
        'category' => $request->get('category'),
        'subject' => $request->get('subject'),
    ]);
}
?>
<section class="recent-documents">
    <div class="card"><!----><!---->
        <div tabindex="0" aria-label="Loading" class="vld-overlay is-active" style="display: none;">
            <div class="vld-background"></div>
            <div class="vld-icon">
                <svg viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                     stroke="#ff686b">
                    <g fill="none" fill-rule="evenodd">
                        <g transform="translate(1 1)" stroke-width="2">
                            <circle stroke-opacity=".25" cx="18" cy="18" r="18"></circle>
                            <path d="M36 18c0-9.94-8.06-18-18-18">
                                <animateTransform attributeName="transform" type="rotate" from="0 18 18"
                                                  to="360 18 18" dur="0.8s"
                                                  repeatCount="indefinite"></animateTransform>
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        <div class="card-body"><!----><!----><h4 class="card-title">So'nggi qo'shilganlar</h4></div>
        <div class="list-group list-group-flush">
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/quymani-tayyorlab-olishning-finish-jarayonlari"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>Quymani tayyorlab olishning finish jarayonlari</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:45:36+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/quymani-tayyorlab-olish-texnologiyasini-loyihalash-asoslari"
                        class="d-block w-100">
                    <h6 class="mb-1">
                        <span>Quymani tayyorlab olish texnologiyasini loyihalash asoslari</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:45:27+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/quymakorlikning-texnologik-asoslari"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>Quymakorlikning texnologik asoslari</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:45:18+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/quymakorlikning-afzalligi"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>Quymakorlikning afzalligi</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:45:05+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/quymakorlik-qotishmalari-va-ularni-xususiyatlari"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>Quymakorlik qotishmalari va ularni xususiyatlari</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:44:52+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/quymakorlik-nuqsonlari-va-quymani-aniqligi"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>Quymakorlik nuqsonlari va quymani aniqligi</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:44:41+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/quymakorlik-metallurgiyasi"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>Quymakorlik metallurgiyasi</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:44:27+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/qoliplarni-tayyorlash"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>Qoliplarni tayyorlash</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:44:12+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/qolipga-suyuq-metall-quyish"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>Qolipga suyuq metall quyish</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:44:00+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
            <div class="list-group-item px-xs-0"><a
                        href="/uz/documents/referatlar/materialshunoslik/o-zaklarni-tayyorlash"
                        class="d-block w-100">
                    <h6 class="mb-1"><span>O’zaklarni tayyorlash</span><span
                                class="badge badge-secondary float-right"><i
                                    class="icofont-clock-time pr-1"></i><time
                                    datetime="2023-01-22T13:43:51+05:00">2 kun oldin</time></span></h6>
                </a><small class="mb-1">Referatlar / Materialshunoslik</small></div>
        </div><!----><!----><!----></div>
</section>
