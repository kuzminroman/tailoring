<?php

/* @var $this yii\web\View */

use kartik\tabs\TabsX;
use yii\helpers\Html;

$this->title = 'Настройки личного кабинета';
$this->params['breadcrumbs'][] = $this->title;

/* @var $this yii\web\View */
/* @var $model common\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

$items = [
    [
        'label'=>'<i class="fas fa-home"></i> Home',
        'content'=>$this->render('/regist-pages/contacts', ['model' => $model]),
        'active'=>true,
    ],
/*    [
        'label'=>'<i class="fas fa-user"></i> Profile',
        'content'=>$content2,
    ],*/
];
?>

<div class="row">
    <div class="col-lg-10">
    <?php
    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_LEFT,
        'encodeLabels'=>false,
        'enableStickyTabs'=>true
    ]);
    ?>
    </div>
</div>
