<?php
$this->title = 'Вход и регистрация';
?>

<div class="open-to-project">
    <div class="open-to-project__login">
        <span class="open-to-project__login__title">Вход</span>
        <form method="post" action="" class="open-to-project__login__form">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label label-form-login">Логин</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Введите логин">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label label-form-login">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Введите пароль">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-form-login">Войти</button>
                </div>
            </div>
        </form>
    </div>
    <div class="open-to-project__regist">
        <span class="open-to-project__regist__title">Зарегистрироваться</span>
        <p class="open-to-project__regist__text">Тэйлорнг - это сервис, предназанченный для котором можно найти
            предложение. Если вы хотите размещаться,
            как алелье, то при регистрации укажите, что-то должно быть написано, сейчас каша в голове, просто жесть</p>
        <div class="group-button-for-main-regist">
            <a href="/layout/regist/?option=z">Заказчик</a>
            <a href="/layout/regist/?option=a">Ателье/Мастер</a>
        </div>
    </div>
</div>
