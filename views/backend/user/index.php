<?php

use yii\helpers\Html;

use app\models\filedb\IdentityStatus;
use yii\grid\GridView;
use yii2tech\admin\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use yii2tech\admin\grid\DeleteStatusColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\db\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'email:email',
            //'authKey',
            //'passwordHash',
            //'passwordResetToken',
           // 'statusId',
            //'createdAt',
            //'updatedAt',
            [
                'header' => 'Имя',
                'attribute' => 'recordusers.firstname',
            ],
            [
                'header' => 'Фамилия',
                'attribute' => 'recordusers.lastname',

            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}{link}',
            ],

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
