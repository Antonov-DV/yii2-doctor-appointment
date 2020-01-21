<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $specializations array */
/* @var $scienceDegrees array */


$this->title = Yii::t('app', 'Update Request: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'specializations' => $specializations,
        'scienceDegrees' => $scienceDegrees,
    ]) ?>

</div>
