<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\db\User */

$this->title = Yii::t('user', 'Edit profile at {appName}', ['appName' => Yii::$app->name]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Dashboard'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('user', 'Profile');
?>
<div class="account-profile">
    <h1><?= Html::encode(Yii::t('user', 'Профиль')) ?></h1>
    
    <div class="row">
        <div class="col-lg-5">
    
            <?php $form = ActiveForm::begin(['id' => 'profile-form']); ?>
    
            <?php // $form->field($model, 'username')->label('Имя') ?>
            
            <?=  $form->field($model, 'firstname') ?>

            <?=  $form->field($model, 'lastname') ?>

            <?php /*<?= $form->field($model, 'username')->textInput() ?> */ ?>

            <?php // $form->field($model, 'email')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('common', 'Сохранить'), ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                <?= Html::a(Yii::t("app", "Вернуться"), ["/account/index"] , ['class' => 'btn btn-info']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
