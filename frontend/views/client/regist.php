<?php

/* @var $this yii\web\View */

use common\models\Client;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model yii\base\Model */
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-registration">
    <h3 class="page-registration__title-form">Регистрация</h3>
    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'page-registration_client__registration-form-main']); ?>
    <?= $form->field($model, 'mail') ?>
    <?= $form->field($model, 'type')->dropDownList(Client::$typeClients) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
