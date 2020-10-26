<?php
/* @var $this yii\web\View */
$this->title = 'Каталог ателье';
$description = 'Перечень услуг ателье по пошиву и ремонту одежды
                штопка, нашивки; ремонт кожаной одежды (работа с жидкой кожей);
                ремонт рукавов; корректировка длины одежды – укорачивание брюк, платьев
                (возможно также удлинение за счет вставок);';

$tags = [
    'Пошив платья',
    'Пошив платья',
    'Пошив платья',
    'Пошив платья',
    'Пошив платья',
    'Пошив платья',
    'Ремонт джинс',
    'Ремонт джинс',
    'Ремонт джинс',
    'Ремонт джинс',
    'Ремонт джинс',
    'Ремонт джинс',
    'Ремонт джинс',
    'Вышивка бисером',
    'Вышивка бисером',
    'Вышивка бисером',
    'Вышивка бисером',
    'Ремонт шубы',
    'Ремонт шубы',
    'Ремонт шубы',
    'Ремонт шубы',
    'Пошив костюма',
    'Пошив костюма',
    'Пошив костюма',
    'Пошив костюма',
    'Пошив костюма',
    'Пошив костюма',
    'Ремонт рубашек'
];

?>

<div class="object-list">
    <div class="object-list__item">
        <div class="object-list__item__left-block">
            <div class="object-list__item__left-block__image">
                <img alt="" src="/images/preview/2_1.jpg"/>
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
                    <?php $i = 0;?>
                    <?php foreach ($tags as $tag) : ?>
                    <?php $i++; ?>
                    <?php if ((int)$i >= 8) : ?>
                            <div class="object-list__item__right-block__info__tags__item">
                                <span class="view-tag-gray">
                                    <span>  <?='...'?> </span>
                                </span>
                            </div>
                       <?php break; ?>
                    <?php endif;?>

                    <div class="object-list__item__right-block__info__tags__item">
                        <span class="view-tag-gray">
                            <span>
                                <?= $tag; ?>
                            </span>
                        </span>
                    </div>
                    <?php endforeach; ?>
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
                    <?php $i = 0;?>
                    <?php foreach ($tags as $tag) : ?>
                        <?php $i++; ?>
                        <?php if ((int)$i >= 8) : ?>
                            <div class="object-list__item__right-block__info__tags__item">
                                <span class="view-tag-gray">
                                    <span>  <?='...'?> </span>
                                </span>
                            </div>
                            <?php break; ?>
                        <?php endif;?>

                        <div class="object-list__item__right-block__info__tags__item">
                        <span class="view-tag-gray">
                            <span>
                                <?= $tag; ?>
                            </span>
                        </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="object-list__item__right-block__description"></div>
        </div>
    </div>
</div>
