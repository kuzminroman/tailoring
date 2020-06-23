<?php
/**
 *  @var $content
 */
use yii\helpers\Html;
yiister\adminlte\assets\Asset::register($this);
\backend\assets\AppAsset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>

    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <?php $this->head() ?>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <?php if (!Yii::$app->getUser()->isGuest) : ?>

    <div class="wrapper">

        <header class="main-header">
            <a href="/" class="logo">
                <span class="logo-mini"></span>
                <span class="logo-lg"></span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span><?=Yii::$app->getUser()->identity->username?> <i class="caret"></i></span>
                            </a>

                            <ul class="dropdown-menu">

                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <span class="fa fa-sign-out"></span>  <a href="<?= \yii\helpers\Url::to(['/site/logout']) ?>"
                                                                                 class="" data-method="post">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <small class="fa fa-circle text-success" alt=""></small>
                    </div>
                    <div class="pull-left info">
                        <p><?= Yii::$app->getUser()->identity->username?></p>
                    </div>
                </div>

                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                    </div>
                </form>

                <?= \yiister\adminlte\widgets\Menu::widget(
                    [
                        "items" => [
                            ["label" => "Home", "url" => "/", "icon" => "home"],
                            ["label" => "Clients", "url" => ["/client"], "icon" => "diamond"],
                            ["label" => "Subject", "url" => ["/subject"], "icon" => "tags"],

                        ],
                    ]
                )
                ?>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?= Html::encode(isset($this->params['h1']) ? $this->params['h1'] : $this->title) ?>
                </h1>
                <?php if (isset($this->params['breadcrumbs'])): ?>
                    <?=
                    \yii\widgets\Breadcrumbs::widget(
                        [
                            'encodeLabels' => false,
                            'homeLink' => [
                                'label' => new \rmrevin\yii\fontawesome\component\Icon('home') . ' Home',
                                'url' => '/',
                            ],
                            'links' => $this->params['breadcrumbs'],
                        ]
                    )
                    ?>
                <?php endif; ?>
            </section>
            <?php endif;?>

            <section class="content">
                <?= $content ?>
            </section>
        </div>
        <?php if (!Yii::$app->getUser()->isGuest) : ?>
            <footer class="main-footer">
                <strong>Nitkigolki &copy; <?= date("Y") ?></strong>
            </footer>
        <?php endif; ?>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>