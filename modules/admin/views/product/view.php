<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить товар', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить товар', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны, что хотите удалить этот товар?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Вернуться в список товаров', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $img = $model->getImage();
    //$gallery = $model->getImages();
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //category_id',
            [
                'attribute' => 'name',
                'value' => function($data){
                    return  Html::a($data->name, ['update', 'id' => $data->id], ['title' => 'Редактировать' . $data->name]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                }
            ],
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('x284')}'>",
                'format' => 'html',
            ],
            'content:html',

            'price',
            //'oldprice',
            'abr',
            'description',
            'keywords',

            /*[
                'attribute' => 'gallery',
                'value' =>  function($gallery){
                    foreach ($gallery as $item) {
                        return $item;
                    }
                },
                'format' => 'html',
            ],*/
            [
                'attribute' => 'hit',
                'value' => function($data){
                    return !$data ->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'new',
                'value' => function($data){
                    return !$data ->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'sale',
                'value' => function($data){
                    return !$data ->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],
            [   'attribute' => 'isset',
                'value' => function($data){
                    return $data ->isset ? '<span>Да</span>' : '<span>Нет</span>';},
                'format' => 'html',
            ],

        ],
    ]) ?>

</div>
