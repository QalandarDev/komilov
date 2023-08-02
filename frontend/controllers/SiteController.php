<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Documents;
use common\models\MyFiles;
use common\models\Subjects;
use common\models\User;
use Yii;
use yii\captcha\CaptchaAction;
use yii\helpers\ArrayHelper;
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
    final public function actionIndex(Request $request): string
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
    final public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            Yii::$app->session->setFlash('error', 'Incorrect username or password.');
            return $this->goHome();
        }

    }

    final public function actionSignup(): Response|string
    {
        $model = new \frontend\models\SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'You have successfully registered');
            return $this->redirect(['login']);
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    final public function actionLogout(): Response|string
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * @throws NotFoundHttpException
     */
    final public function actionDownload(string $slug): Response
    {
        $user = Yii::$app->user->identity;
        $model = Documents::find()->where(['slug' => $slug])->one();
        if (!$model instanceof Documents) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $file = $model->getDownloadFile(true);
        if (file_exists($file)) {
            if ($model->buy($user)) {
                return Yii::$app->response->sendFile($file, $model->fileName, ['inline' => true]);
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @throws NotFoundHttpException
     */
    final public function actionView(string $slug): string
    {
        $slug = strtolower($slug);
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

    final public function actionBalance(): string
    {
        $user = Yii::$app->user->identity;
        $transactions = User::getTransaction($user->id);
        return $this->render('balance', [
            'user' => $user,
            'transactions' => $transactions,
        ]);
    }

    final public function actionFiles(): string
    {
        $user = Yii::$app->user->identity;
        $files = MyFiles::find()->select(['file_id'])->where(['user_id' => $user->id])->asArray()->column();
        $files = Documents::find()->where(['id' => $files])->asArray()->all();
        return $this->render('files', [
            'files' => $files,
        ]);
    }

    final public function actionProfile(): string
    {
        $user = Yii::$app->user->identity;
        return $this->render('profile', [
            'user' => $user,
        ]);
    }
}
