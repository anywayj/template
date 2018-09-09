<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ResourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Игровые ресурсы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resourse-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить ресурсы', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            /*[
                'header'=>'ID', 
                'headerOptions' => ['width' => '80'],
                'attribute' => 'id',
            ],*/
            'name',
            'count',

            [
                'attribute' => 'icon',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/uploads/'. $data['icon'],
                        ['width' => '30px']);
                },
            ],

            [
                'header' => 'Логин',
                'attribute' => 'user.username',

            ],

            [
                'header' => 'Имя',
                'attribute' => 'user.recordusers.firstname',

            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
