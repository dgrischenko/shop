<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новый заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Завершен</span>';
                },
                'format' => 'html'
            ],
            'created_at',
            'updated_at',
            [
                'attribute' => 'qty',
                'value' => function ($data) {
                    return $data->qty . '  ед.';
                }

            ],
            //'qty',
            [
                'attribute' => 'sum',
                'value' => function ($data) {
                    return $data->sum . '  ' . $data->abr;
                }

            ],
            //'sum',
            //'abr',
            //'status',
            //'name:ntext',
            //'email:ntext',
            //'phone:ntext',
            //'address:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
