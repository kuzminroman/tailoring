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

<div style="padding: 25px; background-color: white;" class="settings-personal-area-contacts-main">

    <?php $form = ActiveForm::begin(); ?>

    <?php $tags = \common\modules\tag\models\Tag::find()->all()?>
    <?php $data = \yii\helpers\ArrayHelper::map($tags, 'id', 'name')?>
    <?=  $form->field($model, 'tags')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['multiple' => true] ,
        'pluginOptions' => [
            'tags' => true,
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
