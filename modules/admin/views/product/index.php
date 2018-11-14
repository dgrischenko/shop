<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\Session;
use yii\widgets\DetailView;
use app\modules\admin\models\Product;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новый товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /* [
                 'attribute' => 'image',
                 'value' => "<img src='{$model}'>",
                 'format' => 'html',
             ],
*/

            /*'image','img',*/

            [
                'attribute' => 'name',
                'value' => function ($data) {
                    return Html::a($data->name, ['update', 'id' => $data->id], ['title' => 'Редактировать ' . $data->name]);
                },
                'format' => 'html',
            ],

            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category->name;
                }
            ],
            [
                'attribute' => 'price',
                'value' => function ($data) {
                    return $data->price . '  ' . $data->abr;
                }

            ],
            //'price',
            //'oldprice',
            //'abr',

            ['attribute' => 'isset',
                'value' => function ($data) {
                    return $data->isset ? '<span class="text-success">Да</span>' : '<span class="text-danger">Нет</span>';
                },
                'format' => 'html',
            ],

            [
                'attribute' => 'new',
                'value' => function ($data) {
                    return !$data->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],

            [
                'attribute' => 'hit',
                'value' => function ($data) {
                    return !$data->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],

            [
                'attribute' => 'sale',
                'value' => function ($data) {
                    return !$data->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
                },
                'format' => 'html',
            ],
            //'keywords',
            //'description',
            //'hit',
            //          'id',
            //          'category_id',
            //   'content:ntext',


            ['class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <!--  <img src="<? /*= $model*/ ?>" alt=""-->

</div>
