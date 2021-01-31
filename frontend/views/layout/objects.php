<?php
/* @var $this yii\web\View */
$this->title = 'Каталог ателье';

?>

<div class="object-list">
    <div class="object-list__item">
        <div class="object-list__item__left-block">
            <div class="object-list__item__left-block__image">
                <img alt="" src="/images/preview/2_1.jpg"/>
            </div>
            <div class="object-list__item__left-block__rating">
                <?= \frontend\widgets\ShowRatingWidget::widget([
                    'objectId' => 1,
                    'viewBox' => '0 0 55 55',
                ]) ?>
            </div>

            <div class="object-list__item__left-block__statistic">
                <?= \frontend\widgets\ShowStatisticObjectWidget::widget([
                    'objectId' => 1,
                    'viewBoxFavorite' => '0 0 750 750',
                    'viewBoxReport' => '0 0 600 600',
                    'viewBoxView' => '0 0 32 32',
                ]) ?>
            </div>
        </div>
        <div class="object-list__item__right-block">
            <div class="object-list__item__right-block__title">Ателье &laquo;Ирина&raquo;</div>
            <div class="object-list__item__right-block__info">
                <div class="object-list__item__right-block__info__phone">
                    <a href="tel:+7(812)456-05-16">
                        +7 (812) 456-05-16
                    </a>
                </div>

                <div class="object-list__item__right-block__info__address">
                    <div class="object-list__item__right-block__info__address__full">
                        <span>ул. Дзержинского, д.67А, оф.312</span>
                    </div>
                    <div class="object-list__item__right-block__info__address__raion">
                        <span>Центральный район</span>
                    </div>
                    <div class="object-list__item__right-block__info__address__metro">
                        <?= \frontend\widgets\ShowMetroWidget::widget([
                                'objectId' => 1
                        ]);?>
                    </div>
                </div>

                <div class="object-list__item__right-block__info__tags">
                   <?= \frontend\widgets\ShowTagsWidget::widget([
                           'objectId' => 1
                   ])?>
                </div>
            </div>
            <div class="object-list__item__right-block__description"></div>
        </div>
    </div>
    <hr/>
    <div class="object-list__item">
        <div class="object-list__item__left-block">
            <div class="object-list__item__left-block__image">
                <img alt="" src="/images/preview/2_1.jpg"/>
            </div>
        </div>
        <div class="object-list__item__right-block">
            <div class="object-list__item__right-block__title">Ателье &laquo;Нитки-иголки&raquo;</div>
            <div class="object-list__item__right-block__info">
                <div class="object-list__item__right-block__info__phone">
                    <a href="tel:+7(812)456-05-16">
                        +7(812)111-12-33
                    </a>
                </div>

                <div class="object-list__item__right-block__info__address">
                    <span class="object-list__item__right-block__info__address__full"></span>
                    <span class="object-list__item__right-block__info__address__metro"></span>
                </div>

                <div class="object-list__item__right-block__info__tags">
                    <?= \frontend\widgets\ShowTagsWidget::widget([
                        'objectId' => 1
                    ])?>
                </div>
            </div>
            <div class="object-list__item__right-block__description"></div>
        </div>
    </div>
</div>
