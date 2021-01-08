<?php

use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>
<div style="padding: 25px; background-color: white;" class="settings-personal-area-contacts-main">
    <?php $form = ActiveForm::begin(); ?>

        <div>

            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

            <!-- <div class="row">
                 <div class="form-group col-md-3">
                     <label for="inputCity">Район</label>
                     <input type="text" class="form-control" id="inputCity" value="Центральный" required>
                 </div>
             </div>-->

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <!--<div class="row">
                <div class="form-group col-md-5">
                    <label for="inputAddress">Ближайшее метро</label>
                    <input type="text" class="form-control" id="inputAddress" value="Василеостровская" required>
                </div>
                <div class="yandex-map">
                </div>
            </div>-->

           <!-- <div class="row">
                <div class="form-group col-md-3">
                    <label for="exampleInputEmailPhone">Почта</label>
                    <input type="text" class="form-control" id="exampleInputEmailPhone"
                           aria-describedby="emailPhoneHelp"
                           value="kuzmina@gmail.com">
                </div>
            </div>-->
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
        </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Back', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
