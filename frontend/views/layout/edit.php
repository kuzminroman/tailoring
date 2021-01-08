<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Настройки личного кабинета';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-5">
        <?= $this->render('/regist-pages/main'); ?>
        <?= $this->render('/regist-pages/contacts'); ?>
        <?= $this->render('/regist-pages/tags'); ?>
        <?= $this->render('/regist-pages/social'); ?>
        <?= $this->render('/regist-pages/gallery'); ?>
    </div>
</div>
