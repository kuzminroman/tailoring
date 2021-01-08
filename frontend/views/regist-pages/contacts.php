<div style="padding: 25px; background-color: white;" class="settings-personal-area-contacts-main">
    <form>
        <div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Город</label>
                    <input type="text" class="form-control" id="inputCity" value="Санкт-Петербург" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Район</label>
                    <input type="text" class="form-control" id="inputCity" value="Центральный" required>
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
                <div class="form-group col-md-5">
                    <label for="inputAddress">Ближайшее метро</label>
                    <input type="text" class="form-control" id="inputAddress" value="Василеостровская" required>
                </div>
                <div class="yandex-map">
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
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="inputAddress">Телефон</label>
                    <input type="tel" class="form-control" id="inputAddress" required pattern="^[0-9-()+\s]+$"
                           value="+79617493524">
                </div>
            </div>
        </div>
        <div style="width: 200px">
            <button class="btn btn-main-color" type="submit">Сохранить</button>
            <a href="#">Отмена</a>
        </div>
    </form>
</div>
