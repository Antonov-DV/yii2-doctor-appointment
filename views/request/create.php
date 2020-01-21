<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $specializations array */
/* @var $scienceDegrees array */

$this->title = Yii::t('app', 'Create Request');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'specializations' => $specializations,
        'scienceDegrees' => $scienceDegrees,
    ]) ?>

</div>
