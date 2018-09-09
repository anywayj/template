<?php
/**
 * @see \app\controllers\frontend\AuthController::actionLogin()
 */

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\frontend\LoginForm */

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('auth', 'Log in {appName}', ['appName' => Yii::$app->name]);
$this->params['breadcrumbs'][] = Yii::t('auth', 'Login');
?>
<div class="auth-login">
    <h1><?= Yii::t('auth', 'Логин') ?></h1>

    <p><?= Yii::t('auth', 'Пожалуйста, заполните следующие поля для входа:') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?php if (Yii::$app->user->enableAutoLogin) : ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <?php endif; ?>

            <div style="color:#999;margin:1em 0">
                <?php // Html::a(Yii::t('auth', 'Восстановить пароль'), ['/auth/request-password-reset']) ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('auth', 'Войти'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?= Html::a(Yii::t("app", "Регистрация"), ["/signup/index"] , ['class' => 'btn btn-info']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>