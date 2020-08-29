<div class="settings-personal-area-contacts-main">
    <br/>
    <h1>Настройка личного кабинета</h1>
    <br/>
    <h3>Основаная информация</h3>

    <form>
        <div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="inputName">Наименование</label>
                    <input type="text" class="form-control" id="inputName" value="ООО Ирина">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="exampleInputEmailPhone">Почта</label>
                    <input type="text" class="form-control" id="exampleInputEmailPhone"
                           aria-describedby="emailPhoneHelp"
                           value="kuzmina@gmail.com">
                </div>
            </div>

            <label for="type-organization-work">Направаление деятельности</label>
            <div id="type-organization-work" class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptionsSalon" id="inlineRadioSalon"
                       value="1" checked>
                <label class="form-check-label" for="inlineRadioSalon">Ателье</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptionsMaster" id="inlineRadioMaster"
                       value="2">
                <label class="form-check-label" for="inlineRadioMaster"
                       title="Выбор между мастером или швеей, пока остановимся на таком варианте">Самозанятый<sup>*</sup></label>
            </div>
            <hr/>
            <div class="row">
            <div class="form-group col-md-8">
                <label for="exampleFormControlTextarea1">Описанние</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            </div>

            <hr/>
            <h3>Контактная информация</h3>
            <br/>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Город</label>
                    <input type="text" class="form-control" id="inputCity" value="Санкт-Петербург" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="inputAddress">Адрес</label>
                    <input type="text" class="form-control" id="inputAddress" value="Поспект Сизова д.20/1 " required>
                </div>
                <div class="yandex-map">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="inputAddress">Телефон</label>
                    <input type="tel" class="form-control" id="inputAddress" required pattern="^[0-9-()+\s]+$">
                </div>
            </div>
        </div>
        <div style="width: 200px">
            <button class="btn btn-main-color" type="submit">Сохранить</button>
            <a href="#">Отмена</a>
        </div>
    </form>
</div>