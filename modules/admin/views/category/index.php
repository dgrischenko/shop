<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
   //         'parent_id',
            [
                'attribute' => 'parent_id',
                'value' => function($data){
                    return $data->category->name ? $data->category->name : '--Нет--';
                }
            ],
            'description',
            'keywords',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
