<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpecializationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Specializations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialization-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Specialization'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'value',

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}{createTranslation}',
                'buttons'  => [
                    'createTranslation' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-cloud-upload"></span>', Yii::$app->urlManager->createUrl(['source-message/set-translation', 'word' => $model->value,]), [
                            'title'     => Yii::t('app', 'Set translation'),
                            'data-pjax' => '0',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
