<?php

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */

use common\helpers\LinkHelper;
use kartik\tabs\TabsX;
use yii\helpers\Url;

$this->title = 'Настройка личного кабинета';
$titleBreadcrumbs = 'Личная старница';

$this->params['breadcrumbs'][] = [
    'label' => $titleBreadcrumbs,
    'url' => Url::to(['/' . LinkHelper::getLinkObject($model->type) . '/', 'id' => $model->id])
];

$this->params['breadcrumbs'][] = $this->title;
?>

<?php

$items = [

    [
        'label' => '<i class="fas fa-user"></i> Основаная инфрмация',
        'content' => $this->render('/edit-pages/main', ['model' => $model]),
        'active' => true,
        // 'url' => '#main'
    ],

    [
        'label' => '<i class="fas fa-home"></i> Контактная информация',
        'content' => $this->render('/edit-pages/contacts', ['model' => $model]),

    ],


    [
        'label' => '<i class="fas fa-atom"></i> Ключевые направления',
        'content' => $this->render('/edit-pages/tags', ['model' => $model]),
        // 'url' => '#main'
    ],

    [
        'label' => '<i class="fas fa-image"></i> Галлерея',
        'content' => $this->render('/edit-pages/gallery', ['model' => $model]),
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
