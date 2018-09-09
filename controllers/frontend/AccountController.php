<?php

namespace app\controllers\frontend;

use app\models\frontend\{ChangePasswordForm,ImageUpload,Payments};
use app\models\db\{User,RecordUser};
use Yii;
use yii\filters\AccessControl;
use yii\web\{Controller,NotFoundHttpException,UploadedFile};


/**
 * AccountController
 */
class AccountController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders user dashboard
     * @return mixed response
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * User profile edit form
     * @return mixed response
     */
    public function actionProfile()
    {

        $model = Yii::$app->user->identity->recordusers;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('user', 'Your profile has been updated.'));
            return $this->refresh();
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost) {
            $avatar = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'avatarimage');
            $model->uploadFile($file);
            $avatar->saveImage($model->uploadFile($file));
            Yii::$app->session->setFlash('success', 'Аватарка добавлена');
            return $this->refresh();
            
        }
    
        return $this->render('image', ['model' => $model]);
        
    }

    protected function findModel($id)
    {
        if (($model = RecordUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * User change password form
     * @return mixed response
     */
    public function actionPassword()
    {
        $model = new ChangePasswordForm();

        if ($model->load(Yii::$app->request->post()) && $model->apply()) {
            Yii::$app->session->setFlash('success', Yii::t('user', 'Your profile has been changed.'));

            return $this->refresh();
        }

        return $this->render('password', [
            'model' => $model,
        ]);
    }

    public function actionCreatepay()
    {
        $model = new Payments();
        $model->date = date("Y-m-d H:i:s");
        $model->user_id = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->amount = $model->count*$model->price;
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['payments']);}
        }

        return $this->render('createpay', [
            'model' => $model,
        ]);
    }

    public function actionPayments()
    {
        $pay = new Payments();
        $pay->id = Yii::$app->user->identity->id;

        $payquery = Yii::$app->db->createCommand(
            "SELECT * 
             FROM payments JOIN user
             ON payments.user_id = user.id
             WHERE payments.user_id = '$pay->id' 
        ")->queryAll();

        return $this->render('payments', compact('payquery'));

    }
}