<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вход и регистрация';
/* @var $model \common\models\User */
?>

<div class="open-to-project">
    <div class="open-to-project__login">
        <span class="open-to-project__login__title">Вход</span>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'open-to-project__login__form']]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div style="color:#999;margin:1em 0">
            Если вы забыли пароль, вы можете <?= Html::a('сбросить пароль', ['site/request-password-reset']) ?>.
            <br>
            Если не приходит письмо с подтверждением <?= Html::a('отправить', ['site/resend-verification-email']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style'=>'width:100%;']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
    <div class="open-to-project__regist">
        <span class="open-to-project__regist__title">Зарегистрироваться</span>
        <p class="open-to-project__regist__text">Тэйлорнг - это сервис, предназанченный для котором можно найти
            предложение. Если вы хотите размещаться,
            как алелье, то при регистрации укажите, что-то должно быть написано, сейчас каша в голове, просто жесть</p>
        <div class="group-button-for-main-regist">
            <?= Html::a('Регистарация', ['/client/regist/']); ?>
        </div>
    </div>
</div>
