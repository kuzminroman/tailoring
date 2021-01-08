<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ClientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'dateCreate') ?>

    <?php // echo $form->field($model, 'dateUpdate') ?>

    <?php // echo $form->field($model, 'viewCategory') ?>

    <?php // echo $form->field($model, 'typeWork') ?>

    <?php // echo $form->field($model, 'approve') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'descriptionSeo') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
