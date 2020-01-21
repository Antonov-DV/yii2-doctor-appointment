<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 27.05.18
 * Time: 23:19
 */

use app\models\Message;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $sourceWord string */
/* @var $messageModel Message */


$this->title = Yii::t('app', 'Setting translation for word "{word}"', ['word' => $sourceWord]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Source Messages'), 'url' => ['set-translation']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="source-message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($messageModel, 'translation')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>