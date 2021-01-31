<?php
use yii\helpers\Html;$this->title = 'Вход и регистрация';
?>

<div class="open-to-project">
    <div class="open-to-project__login">
        <span class="open-to-project__login__title">Вход</span>
        <form method="post" action="" class="open-to-project__login__form">



        </form>
    </div>
    <div class="open-to-project__regist">
        <span class="open-to-project__regist__title">Зарегистрироваться</span>
        <p class="open-to-project__regist__text">Тэйлорнг - это сервис, предназанченный для котором можно найти
            предложение. Если вы хотите размещаться,
            как алелье, то при регистрации укажите, что-то должно быть написано, сейчас каша в голове, просто жесть</p>
        <div class="group-button-for-main-regist">
            <?= Html::a('Регистарация', ['/client/regist/']);?>
        </div>
    </div>
</div>
