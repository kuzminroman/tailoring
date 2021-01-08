<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model yii\base\Model */
?>

<div style="padding: 25px; background-color: white;" class="settings-personal-area-contacts-main">

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?php if ($model->type !== 1) : ?>
        <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'last_name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'middle_name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'gender')->dropDownList(Client::$gender) ?>
    <?php else : ?>
        <?= $form->field($model, 'first_name')->textInput(['autofocus' => true])->label('Наименование') ?>

    <?php endif;?>
    <?= $form->field($model, 'type')->dropDownList(\common\models\Client::$typeClients) ?>
    <?= $form->field($model, 'description')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<!--        <div class="row">-->
<!--            <div class="form-group col-md-8">-->
<!--                <label for="exampleFormControlSelect2">Выберите рабочие дни:</label>-->
<!--                <select multiple class="form-control" id="exampleFormControlSelect2">-->
<!--                    <option value="1">Понедельник</option>-->
<!--                    <option value="2">Вторник</option>-->
<!--                    <option value="3">Среда</option>-->
<!--                    <option value="4">Четверг</option>-->
<!--                    <option value="5">Пятница</option>-->
<!--                    <option value="6">Суббота</option>-->
<!--                    <option value="7">Воскресенье</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col-md-3 mb-3">-->
<!--                <span style="font-weight: bold;">Рабочее время:</span>-->
<!--            </div>-->
<!--            <br/>-->
<!--            <div class="col-md-3 mb-3">-->
<!--                <input type="text" class="form-control" placeholder="10" required>-->
<!--            </div>-->
<!--            <div class="col-md-3 mb-3">-->
<!--                <input type="text" class="form-control" placeholder="20" required>-->
<!--            </div>-->
<!--        </div>-->




