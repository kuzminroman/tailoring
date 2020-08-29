<?php
/* @var $this yii\web\View */
$this->title = 'Регистрация';
?>
<div class="page-registration">
    <h3 class="page-registration__title-form">
        Регистрация <?= Yii::$app->request->get('option') === 'A' ? 'клиента' : 'пользователя' ?></h3>
    <form class="page-registration_client__registration-form-main" action="#" method="post">
        <?php if (Yii::$app->request->get('option') === 'A') : ?>
            <div class="form-group">
                <label for="inputName">Наименование</label>
                <input type="text" class="form-control" id="inputName">
                <small id="nameHelp" class="form-text text-muted">Для самозанятых можно указать ФИО. Для ателье
                    наименование организаци</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmailPhone">Укажите почту или телефон</label>
                <input type="text" class="form-control" id="exampleInputEmailPhone" aria-describedby="emailPhoneHelp">
            </div>

            <label for="type-organization-work">Выберите направление деятельности</label>
            <div id="type-organization-work" class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptionsSalon" id="inlineRadioSalon"
                       value="1">
                <label class="form-check-label" for="inlineRadioSalon">Ателье</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptionsMaster" id="inlineRadioMaster"
                       value="2">
                <label class="form-check-label" for="inlineRadioMaster"
                       title="Выбор между мастером или швеей, пока остановимся на таком варианте">Самозанятый<sup>*</sup></label>
            </div>
            <div class="form-group">
                <small id="sectionHelp" class="form-text text-muted">Если вы не ателье, то выберите пункт &laquo;Мастер&raquo;</small>
            </div>
        <?php elseif(Yii::$app->request->get('option') === 'Z') : ?>
            <div class="form-group">
                <label for="inputNameUser">Имя</label>
                <input type="text" class="form-control" id="inputNameUser">
            </div>
            <div class="form-group">
                <label for="inputSurname">Фамилия</label>
                <input type="text" class="form-control" id="inputSurname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmailPhone">Укажите почту или телефон</label>
                <input type="text" class="form-control" id="exampleInputEmailPhone" aria-describedby="emailPhoneHelp">
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-main-color">Регистрация</button>
    </form>
</div>