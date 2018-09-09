<?php
/**
 * @see \app\controllers\frontend\SignupController::actionIndex()
 */

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\frontend\SignupForm */

$this->title = Yii::t('auth', 'Sign up with {appName}', ['appName' => Yii::$app->name]);
$this->params['breadcrumbs'][] = Yii::t('auth', 'Signup');
?>
<div class="signup-index">
    <h1><?= Html::encode(Yii::t('auth', 'Регистрация')) ?></h1>

    <p><?= Yii::t('auth', 'Пожалуйста, заполните следующие поля для регистрации:') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($modelnew, 'firstname') ?>

                <?= $form->field($modelnew, 'lastname') ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('auth', 'Зарегистрироваться'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                <?= Html::a(Yii::t("app", "Вернуться"), ["/auth/login"] , ['class' => 'btn btn-info']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
