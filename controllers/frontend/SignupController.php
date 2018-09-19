<?php

namespace app\controllers\frontend;

use app\models\frontend\{SignupForm,SignupFormtwo};
use yii\filters\{AccessControl,VerbFilter};
use Yii;
use yii\base\Exception;
use yii\web\Controller;

/**
 * SignupController provides the user signup functionality.
 */
class SignupController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest) {
            $this->goHome();
            return false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {

        $model = new SignupForm();
        $modelnew = new SignupFormtwo();
        $modelnew->avatarimage = 'owl.video.play.png';
        if ($model->load(Yii::$app->request->post()) && $modelnew->load(Yii::$app->request->post())) {
            $user1 = $modelnew->signuptwo();
            if (($user = $model->signup()) !== null) {
               if (Yii::$app->getUser()->login($user)) {
               Yii::$app->session->setFlash('success', Yii::t('access', 'Спасибо за регистрацию!'));
                    return $this->goHome();
                } 
            }  
        }

        return $this->render('index', compact('model','modelnew'));
    }
}
