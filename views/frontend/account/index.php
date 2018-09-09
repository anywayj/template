<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\db\User */

$this->title = Yii::t('user', 'Dashboard of {appName}', ['appName' => Yii::$app->name]);
$this->params['breadcrumbs'][] = Yii::t('user', 'Dashboard');
?>
<div class="account-index">
    <div class="body-content">
        <div class="row">
             <div class="col-lg-4">
                <div class="list-group">
                    <a class="list-group-item active">
                    <?php $user = Yii::$app->user->identity->recordusers; ?>
                        
                    <?php if($user->avatarimage): ?>
                       <img src="/uploads/<?= $user->avatarimage ?>" width="15%" height="15%" alt="фото"/>
                    <?php else: ?>
                       <img src="/uploads/owl.video.play.png" width="15%" height="15%" alt="но-фото"/> 
                    <?php endif; ?>


                    <b style="padding-left:10px"><?= $user->firstname.' '.$user->lastname ?></b>   
                    </a>
               
                    <a href="<?= \yii\helpers\Url::to(['/account/profile', 'id' => Yii::$app->user->identity->id])?>" class="list-group-item">
                        <span class="fa fa-list-alt"></span> Редактировать данные
                    </a>

                    <a href="<?= \yii\helpers\Url::to(['/account/password', 'id' => Yii::$app->user->identity->id])?>" class="list-group-item">
                        <span class="fa fa-list-alt"></span> Изменить пароль
                    </a>

                    <a href="<?= \yii\helpers\Url::to(['account/image', 'id' => Yii::$app->user->identity->id])?>" class="list-group-item">
                        <span class="fa fa-list-alt"></span> Изменить аватарку
                    </a>
                 
                    <a href="<?= \yii\helpers\Url::to(['resourse/index'])?>" class="list-group-item">
                        <span class="fa fa-list-alt"></span> Ресурсы
                    </a>
                    <a href="<?= \yii\helpers\Url::to(['account/payments'])?>" class="list-group-item">
                        <span class="fa fa-list-alt"></span> Платежи
                    </a>
                </div>  
            </div>
            
            <div class="col-lg-8">
                <div class="jumbotron">
                    <h1><?= Yii::t('user', 'Dashboard') ?></h1>

                    <p class="lead">Welcome to your account.</p>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-lg-4">
                <h2>Edit Photo</h2>

                <p>Edit your avatar.</p>

                <p><?= Html::a('Edit Photo', ['/account/image', 'id' => Yii::$app->user->identity->id], ['class' => 'btn btn-default']) ?></p>

            </div>

            <div class="col-lg-4">
                <h2>Edit Profile</h2>

                <p>Edit your profile.</p>

                <p><?= Html::a('Edit Profile', ['/account/profile'], ['class' => 'btn btn-default']) ?></p>

            </div>
            
            <div class="col-lg-4">
                <h2>Change Password</h2>

                <p>Change your password.</p>

                <p><?= Html::a('Change Password', ['/account/password'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>
    </div>
</div>

