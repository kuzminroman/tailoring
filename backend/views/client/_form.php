<?php

use kartik\select2\Select2;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zxbodya\yii2\galleryManager\GalleryManager;
use common\models\Client;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(Client::$gender) ?>

    <?= $form->field($model, 'type')->dropDownList(Client::$typeClients) ?>

    <?= $form->field($model, 'phones')->widget(MultipleInput::className(), [
        'max' => 6,
        'min' => 1,
        'allowEmptyList' => false,
        'enableGuessTitle' => true,
        'addButtonPosition' => MultipleInput::POS_HEADER,
        'columns' => [
            [
                'name' => 'input_phone',
                'type' => \yii\widgets\MaskedInput::className(),
                'options' => [
                    'mask' => '+7(999) 999-99-99',
                    'options' => [
                        'class' => 'input-phone form-control',
                    ],
                ],
            ],
        ],
    ])
        ->label(false);
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])  ?>

    <?php $subject = \common\modules\tag\models\Tag::find()->all()?>
    <?php $data = \yii\helpers\ArrayHelper::map($subject, 'id', 'name')?>
    <?=  $form->field($model, 'tags')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['multiple' => true] ,
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
        ],
    ]);?>

    <?php if (!$model->isNewRecord) {
        echo GalleryManager::widget(
            [
                'model' => $model,
                'behaviorName' => 'galleryBehavior',
                'apiRoute' => 'client/galleryApi'
            ]
        );
    }
    ?>

    <hr/>
    <h1> Seo-раздел</h1>

    <?= $form->field($model, 'seo_title')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'seo_keywords')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'seo_description')->textarea(['rows' => 6]) ?>

    <hr/>
    <h1> Раздел подтверждения</h1>

    <?= $form->field($model, 'approve')->dropDownList(Client::$approve) ?>

    <?php $status = [
        0 => 'Удален',
        1 => 'Действителен',
    ] ?>

    <?= $form->field($model, 'status')->dropDownList($status) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
