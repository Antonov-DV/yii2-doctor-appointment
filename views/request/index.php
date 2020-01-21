<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('app', 'Requests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Request'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            'firstname',
            'lastname',
            'fathername',
            [
                'attribute' => 'specialization_id',
                'label'     => Yii::t('app', 'Specialization'),
                'value'     => 'specialization.value',
            ],
            [
                'attribute' => 'science_degree_id',
                'label'     => Yii::t('app', 'Science degree'),
                'value'     => 'scienceDegree.value',
            ],
            'willing_at',
            [
                'attribute' => 'is_paid',
                'value'     => function ($model) {
                    return ($model->is_paid == 1) ? Yii::t('app', 'Yes') : Yii::t('app', 'No');
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
