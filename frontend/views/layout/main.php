<?php
/* @var $this yii\web\View */
$this->title = 'Все ателье по пошиву и ремноту в Санкт-Петербурге';
?>

<nav class="navbar navbar-expand-lg navbar-dark blue lighten-2 mb-4 nav-main-search">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline mr-auto">
            <input class="form-control main-search" type="text" placeholder="Поиск ателье" aria-label="Search">
            <button class="btn btn-mdb-color btn-rounded btn-sm my-0 ml-sm-2 btn btn-success" type="submit">Поиск
            </button>
        </form>
    </div>
</nav>

<div class="popular-questions">
    <span class="popular-questions__title">Популярные запросы:</span>
    <span class="popular-questions__item">Сшить платье</span>
    <span class="popular-questions__item">Ремонт шубы</span>
    <span class="popular-questions__item">Сшить брюки</span>
    <span class="popular-questions__item">Пошив пальто</span>
</div>

<section class="main-page-header-image">
    <section class="main-page-header-image__caption">
        <h2 class="main-page-header-image__caption__main">Реализуй свои мечты</h2>
    </section>
</section>

<section class="studios">
    <h1 class="studios__title">Список ателье Санкт-Петербурга</h1>
    <div class="studios__wrapper">
        <ul class="studios__wrapper__list">
            <li class="studios__wrapper__list__item">
                <a href="#">
                    <div class="studios__wrapper__list__item__image">
                        <svg class="studios__wrapper__list__item__image__favorite" viewBox="0 0 95 95">
                            <use xlink:href="/images/icons/favorite.svg#Icons"></use>
                        </svg>
                        <img src="/images/preview/2_1.jpg" class="studios__wrapper__list__item__image__preview"/>
                    </div>

                    <div class="studios__wrapper__list__item__details">
                        <div class="rating-object">
                            <svg class="rating-object__icon" viewBox="0 0 95 95">
                                <use xlink:href="/images/icons/new-star.svg#star_id"></use>
                            </svg>
                            <svg class="rating-object__icon" viewBox="0 0 95 95">
                                <use xlink:href="/images/icons/new-star.svg#star_id"></use>
                            </svg>

                            <svg class="rating-object__icon" viewBox="0 0 95 95">
                                <use xlink:href="/images/icons/new-star.svg#star_id"></use>
                            </svg>

                            <svg class="rating-object__icon" viewBox="0 0 95 95">
                                <use xlink:href="/images/icons/new-star.svg#star_id"></use>
                            </svg>

                            <svg class="rating-object__icon" viewBox="0 0 95 95">
                                <use xlink:href="/images/icons/new-star.svg#star_id"></use>
                            </svg>
                        </div>
                        <h1>
                            <span>Ателье &laquoИрина&raquo</span>
                        </h1>
                        <div class="studios__wrapper__list__item__details__metro">
                            <svg class="metro-svg" viewBox="0 0 95 95">
                                <use xlink:href="/images/icons/metroSpb.svg#svg_1"></use>
                            </svg>
                            <span class="metro-title">Василеостровская</span>
                            <span class="metro-time">(10 мин)</span>
                        </div>
                        <div class="studios__wrapper__list__item__details__statistic">
                            <div class="statistic-object-views">
                                <span class="statistic-object-views__count-all">1674</span>
                                <span class="statistic-object-views__today" title="За сегодня">33</span>
                                <svg class="statistic-object-views__icon" viewBox="0 0 25 25">
                                    <use xlink:href="/images/icons/views.svg#icon"></use>
                                </svg>
                            </div>
                            <div class="statistic-object-favorite">
                                <span class="statistic-object-favorite__count-all">412</span>
                                <svg class="statistic-object-favorite__icon" viewBox="0 0 480 480">
                                    <use xlink:href="/images/icons/heart.svg#Layer_1"></use>
                                </svg>
                            </div>
                            <div class="statistic-object-report">
                                <span class="statistic-object-report__count-all">123</span>
                                <svg class="statistic-object-report__icon" viewBox="0 0 480 480">
                                    <use xlink:href="/images/icons/report.svg#Layer_x0020_1"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="studios__wrapper__show-more">
            <span class="studios__wrapper__show-more__title">ПОКАЗАТЬ БОЛЬШЕ</span>
        </div>
    </div>
</section>