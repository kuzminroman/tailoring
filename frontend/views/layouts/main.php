<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\helpers\GeoHelper;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use kartik\icons\FontAwesomeAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\helpers\LinkHelper;

AppAsset::register($this);
FontAwesomeAsset::register($this);
Yii::$app->name = 'Tailoring';
Yii::$app->homeUrl = '/'
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('/images/other/logo4.png'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => GeoHelper::getCityName(), 'url' => ['/#'], 'options' => ['class' => 'geo-location']],
        ['label' => 'Катлог ателье', 'url' => ['/layout/objects/']],
        ['label' => 'На карте', 'icon' => 'cog', 'url' => ['/layout/map/']],
        ['label' => '', 'url' => ['/layout/wishlist/']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Вход и регистрация', 'url' => ['/main/open/']];
    } else {
        $menuItems[] =  ['label' => 'Мой профиль', 'url' => [LinkHelper::getLinkObject()]];
        $menuItems[] = '<li class="nav-logout">'
            . Html::beginForm(['/site/logout/'], 'post')
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout', 'style' => ['color' => '#DDD !important;']]
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <div class="container main-page">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right">Напишите нам</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
