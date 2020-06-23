<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\subject\models\Subject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-form">
    <?php var_dump($_POST)?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php $data = [
            1 => 'dadsads',
        2 => '321321'
    ]?>

    <?=  $form->field($model, 'keywords')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Select a state ...', 'multiple' => true] ,
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
        ],
    ]);?>


    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
