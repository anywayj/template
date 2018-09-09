<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\frontend\ChangePasswordForm */

$this->title = Yii::t('user', 'Change password for {appName}', ['appName' => Yii::$app->name]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Dashboard'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('user', 'Change Password');
?>
<div class="account-password">
    <h1><?= Html::encode(Yii::t('user', 'Изменить пароль')) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'password-form']); ?>

            <?= $form->field($model, 'oldPassword')->passwordInput()->label('Старый пароль') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Новый пароль') ?>

            <?= $form->field($model, 'passwordRepeat')->passwordInput()->label('Повторите пароль') ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('common', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                <?= Html::a(Yii::t("app", "Вернуться"), ["/account/index"] , ['class' => 'btn btn-info']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>





