<?php

/* @var $this yii\web\View */

use kartik\tabs\TabsX;

$this->title = 'Настройки личного кабинета';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

$items = [
    [
        'label' => '<i class="fas fa-home"></i> Контактная информация',
        'content' => $this->render('/regist-pages/contacts', ['model' => $model]),
        'active' => true,
    ],

    [
        'label' => '<i class="fas fa-user"></i> Основаная инфрмация',
        'content' => $this->render('/regist-pages/main', ['model' => $model]),
        // 'url' => '#main'
    ],

    [
        'label' => '<i class="fas fa-user"></i> Ключевые направления',
        'content' => $this->render('/regist-pages/tags', ['model' => $model]),
        // 'url' => '#main'
    ],

    [
        'label' => '<i class="fas fa-user"></i> Галлерея',
        'content' => $this->render('/regist-pages/gallery', ['model' => $model]),
        // 'url' => '#main'
    ],
];
?>

<div class="row">
    <div class="col-lg-10">
        <?php
        echo TabsX::widget([
            'items' => $items,
            'position' => TabsX::POS_LEFT,
            'encodeLabels' => false,
            'enableStickyTabs' => true
        ]);
        ?>
    </div>
</div>
