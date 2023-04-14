<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Documents;
use common\models\Subjects;
use Yii;
use yii\captcha\CaptchaAction;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\ErrorAction;
use yii\web\NotFoundHttpException;
use yii\web\Request;
use yii\web\Response;

/**
 * Site controller
 * @var Documents $model
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex(Request $request)
    {
        $category = $request->get('category') ?? '';
        return $this->render('index', [
            'category' => $category,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * @throws NotFoundHttpException
     */
    final public function actionDownload(string $slug): Response
    {
        $model = Documents::find()->where(['slug' => $slug])->one();
        if(!$model instanceof Documents) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $file = $model->getDownloadFile(true);
        if (file_exists($file)) {
            return Yii::$app->response->sendFile($file, $model->fileName, ['inline' => true]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @throws NotFoundHttpException
     */
    final public function actionView(string $slug): string
    {
        $model = Documents::find()->where(['slug' => $slug])->one();
        $file = $model->getDownloadFile();
        if (file_exists($file)) {
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @throws NotFoundHttpException
     */
    final public function actionList(string $subject, Request $request, string $category = 'all'): string
    {
        if ($category != 'all' && !$this->isCategoryExist($category)) {
            throw new NotFoundHttpException('Category not found');
        } elseif (!$this->isSubjectExist($subject)) {
            throw new NotFoundHttpException('Subject not found');
        }
        return $this->render('list', [
            'category' => $category,
            'subject' => $subject,
        ]);
    }

    /**
     * @throws NotFoundHttpException
     */
    final public function actionImage(string $slug): Response
    {
        $model = Documents::find()->where(['slug' => $slug])->one();
        $file = $model->imageFile;
        if (file_exists($file)) {
            //streaming file
            return Yii::$app->response->sendFile($file, $model->name, ['inline' => true]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function isCategoryExist(string $category): bool
    {
        return Category::findOne(['slug' => $category]) instanceof Category;
    }

    private function isSubjectExist(string $subject): bool
    {
        return Subjects::findOne(['slug' => $subject]) instanceof Subjects;
    }

}
