<?php

use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */

$webUser = Yii::$app->user;

NavBar::begin([
    'id' => 'header',
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);

if ($webUser->isGuest) {
    $menuItems = [
        ['label' => Yii::t('yii', 'Adminka'), 'url' => Yii::$app->request->getBaseUrl() . '/admin.php'],
    ];
    $menuItems[] = ['label' => Yii::t('menu', 'Login'), 'url' => ['/auth/login']];
} else {
    $menuItems = [
        ['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->request->getBaseUrl() . '/index.php'],
        ['label' => Yii::t('yii', 'Adminka'), 'url' => Yii::$app->request->getBaseUrl() . '/admin.php'],
    ];
    //$menuItems[] = ['label' => Yii::t('menu', 'Resourses'), 'url' => ['/resourse/index']];
    //$menuItems[] = ['label' => Yii::t('menu', 'Payments'), 'url' => ['/account/payments']];
    $menuItems[] = ['label' => Yii::t('menu', 'Account'), 'url' => ['/account/index']];
    $menuItems[] = '<li>'
        . Html::beginForm(['/auth/logout'], 'post', ['class' => 'navbar-form'])
        . Html::submitButton(
            'Logout (' . $webUser->identity->username . ')',
            ['class' => 'btn btn-link']
        )
        . Html::endForm()
        . '</li>';
}

echo Nav::widget([
    'id' => 'header-menu',
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>