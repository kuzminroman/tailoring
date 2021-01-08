<?php

use common\models\Client;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Client', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            [
                'attribute' => 'type',
                'label' => 'Тип клиента',
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {
                    return Client::$typeClients[$data->type];
                },

                'filter' => Client::$typeClients,
            ],
            //  Client::$typeClients['type'],
            //'mail',
            //'desc',
            //'type',
            //'dateCreate',
            //'dateUpdate',
            //'viewCategory',
            //'typeWork',
            //'approve',
            //'title:ntext',
            //'keywords:ntext',
            //'descriptionSeo:ntext',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
