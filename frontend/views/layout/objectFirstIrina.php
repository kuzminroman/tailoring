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
            <div class="object-page__header__right-block__send-message">
                <button>Отправить сообщение</button>
            </div>

        </div>
    </div>

    <div class="object-page__block-description">
        <p>kffdsfdfsfdfdfs
            ffdsfdfsfdfdfs</p>
        <p>kffdsfdfsfdfdfs
            kffdsfdfsfdfdfs</p>
    </div>
</div>