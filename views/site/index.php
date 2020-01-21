<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=Yii::t('app','Hello admin')?></h1>
    </div>

    <div class="body-content">
        <?= \yii\bootstrap\Nav::widget([ 'items' => [
        [
            'label' => Yii::t('app','Requests'),
            'url' => ['request/index'],
            'visible' => !Yii::$app->user->isGuest

        ],
        [
            'label' => Yii::t('app','Specializations'),
            'url' => ['specialization/index'],
            'visible' => !Yii::$app->user->isGuest

        ],
        [
            'label' => Yii::t('app','Science degrees'),
            'url' => ['science-degree/index'],
            'visible' => !Yii::$app->user->isGuest

        ],
    ],
    'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
]); ?>

    </div>
</div>
