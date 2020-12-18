<?php
/* @var $this yii\web\View */
$this->title = 'Ателье Ирина';
?>

<div class="object-page">
    <div class="object-page__header">
        <div class="object-page__header__left-block">
            <div class="object-page__header__left-block__slider">
                <div class="object-page__header__left-block__slider__gallery">
                    <div class="object-page__header__left-block__slider__gallery__list">
                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                            <li data-thumb="/images/preview/2_1.jpg">
                                <img src="/images/preview/2_1.jpg"/>
                            </li>
                            <li data-thumb="/images/preview/2_1.jpg">
                                <img src="/images/preview/2_1.jpg"/>
                            </li>
                            <li data-thumb="/images/preview/2_1.jpg">
                                <img src="/images/preview/2_1.jpg"/>
                            </li>
                            <li data-thumb="/images/preview/2_1.jpg">
                                <img src="/images/preview/2_1.jpg"/>
                            </li>
                            <li data-thumb="/images/preview/2_1.jpg">
                                <img src="/images/preview/2_1.jpg"/>
                            </li>
                            <li data-thumb="/images/preview/2_1.jpg">
                                <img src="/images/preview/2_1.jpg"/>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="object-page__header__right-block">
            <div class="object-page__header__right-block__title">
                <span>Ателье &laquo;Ирина&raquo;</span>
                <span class="object-page__header__right-block__title__favorite"></span>
            </div>
            <div class="object-page__header__right-block__phone">
                <label for="phone-number-object">Телефон:</label>
                <a id="phone-number-object" href="tel:+7 (961) 749-35-24">
                    +7 (961) 749-35-24
                </a>
            </div>
            <div class="object-page__header__right-block__address">
                <label for="address-object">Адрес:</label>
                <span id="address-object">
                    ул.Дзержинского д.22, оф.132
                </span>
                <span class="object-page__header__right-block__address__in-map" data-toggle="tooltip" data-placement="top" title="Открыть карту">на карте</span>
                <br/>
                <label for="raion-object">Район:</label>
                <span id="raion-object">Центральный</span>
                <div class="object-page__header__right-block__address__metro">
                    <span id="title-metro">Метро:</span>
                    <?= \frontend\widgets\ShowMetroWidget::widget([
                        'objectId' => 1,
                    ]) ?>
                </div>
            </div>
            <div class="object-page__header__right-block__rating">
                <span>Рейтинг:</span>
                <?= \frontend\widgets\ShowRatingWidget::widget([
                    'objectId' => 1,
                    'viewBox' => '0 0 75 75'
                ]) ?>
            </div>
            <?php if (Yii::$app->user->isGuest) : ?>
                <div class="object-page__header__right-block__send-message">
                    <button type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Отправить
                        сообщение
                    </button>
                </div>
            <?php endif; ?>
            <br/>
            <div class="object-page__header__right-block__address__share">
                <span>Поделиться:</span>
                <br/>
                <div class="ya-share2" data-curtain
                     data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
            </div>
        </div>
    </div>

    <div class="object-page__map">
    </div>

    <div class="object-page__block-description">
        <p style="text-align: center; margin-bottom: 15px;">Описание</p>
        <p>Качественное выполнение работы. Индивидуальный подход к каждому.</p>
        <div class="object-page__block-description__operating-mode">
            <p>Понедельник - пятница <span>9:00 - 18:00</span></p>
            <p>Суббота - воскресенье <span>выходной</span></p>
        </div>

        <div class="object-page__block-description__params">
            <p>Минимальная стоимость заказа <span>1000 руб</span></p>
            <p>Минимальный срок выполнения <span>1 день</span></p>
        </div>
    </div>

    <div class="object-page__tags">
        <p>Ключевые направления</p>
        <?= \frontend\widgets\ShowTagsWidget::widget([
            'objectId' => 1,
            'isObject' => true,
        ]) ?>
    </div>

    <div class="object-page__social">
        <span>Социальные сети</span>
    </div>


    <div class="object-page__reports">
        <div style="text-align: center;">
            <span>Отзывы</span>
        </div>
        <br/>
        <div style="display: grid;">
            <?= \frontend\widgets\ShowReportsWidget::widget() ?>
        </div>
        <span class="object-page__reports__add-report" data-toggle="modal" data-target="#addReport" data-whatever="@mdo">Добавить отзыв</span>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <textarea placeholder="<?= Yii::t('app', 'Write message') ?>" class="form-control"
                                      rows="6"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="modal-footer__link-to-dialog" href="#"><?= Yii::t('app', 'Go to dialog') ?></a>
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
                    <button type="button" class="btn btn-primary"><?= Yii::t('app', 'Send') ?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addReport" tabindex="-1" role="dialog" aria-labelledby="addReportLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputName">Имя</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSurname">Фамилия</label>
                            <input type="text" class="form-control" id="exampleInputSurname" placeholder="">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="<?= Yii::t('app', 'Write message') ?>" class="form-control" rows="6"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?= Yii::t('app', 'Close') ?></button>
                    <button type="button" class="btn btn-primary"><?= Yii::t('app', 'Send') ?></button>
                </div>
            </div>
        </div>
    </div>
    <?php
    //
    //    $ip = '77.222.100.8';
    //    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip.'?lang=ru'));
    //    var_dump($query);
    //
    //    if($query && $query['status'] == 'success') {
    //        echo 'Привет, посетитель из '.$query['country'].', '.$query['city'].'!';
    //        } else {
//        echo 'Не удалось определить локацию';
//    }
?>
