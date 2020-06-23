<?php

use unclead\multipleinput\MultipleInput;
use zxbodya\yii2\galleryManager\GalleryManager;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php $gender = [
            1 =>'Женский',
            2 => 'Мужской'
    ];?>

    <?= $form->field($model, 'gender')->dropDownList($gender) ?>

    <?php $typeClient = [
        1 => 'Заказчик',
        2 => 'Ателье',
        3 => 'Самозанятый',
    ];?>

    <?= $form->field($model, 'type')->dropDownList($typeClient) ?>

    <?= $form->field($model, 'phones')->widget(MultipleInput::className(), [
        'max'               => 6,
        'min'               => 1,
        'allowEmptyList'    => false,
        'enableGuessTitle'  => true,
        'addButtonPosition' => MultipleInput::POS_HEADER,
        'columns' => [
                [
                    'name' => 'Phones',
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

<!--    --><?/*= $form->field($model, 'address')->textInput(['maxlength' => true])*/?>
   <!-- <script src="https://api-maps.yandex.ru/2.1/?apikey=aef2f501-a4f6-4587-b78f-f585821d7652&lang=ru_RU" type="text/javascript">
    </script>-->

    <?= $form->field($model, 'mail')->input('email') ?>
    <?= $form->field($model, 'desc')->textarea(['rows' => 6])  ?>

    <?php $subject = \common\modules\subject\models\Subject::find()->all()?>
    <?php $data = \yii\helpers\ArrayHelper::map($subject, 'id', 'name')?>
    <?=  $form->field($model, 'subjects')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Select a state ...', 'multiple' => true] ,
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
        ],
    ]);?>

    <?php $viewCategory = \common\models\ViewCategory::find()->all()?>
    <?php $viewCategory = \yii\helpers\ArrayHelper::map($viewCategory, 'id', 'name')?>

    <?= $form->field($model, 'arrayViewCategory')->widget(Select2::classname(), [
        'data' => $viewCategory,
        'options' => ['placeholder' => 'Select a state ...', 'multiple' => true] ,
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
        ],
    ]); ?>

    <?php if ($model->isNewRecord) {
        echo 'Can not upload images for new record';
    } else {
        echo GalleryManager::widget(
            [
                'model' => $model,
                'behaviorName' => 'galleryBehavior',
                'apiRoute' => 'client/galleryApi'
            ]
        );
    }
    ?>

    <?php $typeWork =  \common\models\TypeWork::find()->all() ?>
    <?php $typeWork =  \yii\helpers\ArrayHelper::map($typeWork, 'id', 'name') ?>

    <?= $form->field($model, 'arrayTypeWork')->widget(Select2::classname(), [
        'data' => $typeWork,
        'options' => ['placeholder' => 'Select a state ...', 'multiple' => true] ,
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
        ],
    ]); ?>

    <hr/>
    <h1> Seo-раздел</h1>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'keywords')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'descriptionSeo')->textarea(['rows' => 6]) ?>

    <hr/>
    <h1> Раздел подтверждения</h1>

    <?php $approve = [
            1 => 'Модерация',
            2 => 'Опубликован',
            3 => 'Снят с публикации'
    ]?>

    <?= $form->field($model, 'approve')->dropDownList($approve) ?>
    <?php $status = [
        0 => 'Удален',
        1 => 'Действителен',
    ]?>

    <?= $form->field($model, 'status')->dropDownList($status) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>