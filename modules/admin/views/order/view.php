<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">
    <h1>Просмотр заказа №<?= $model->id ?></h1>

    <p>
        <?= Html::a('Редактировать заказ', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить заказ', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post',],]) ?>
    </p>

    <?php $items = $model->ordertItems; ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименвание</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><a href="<?= \yii\helpers\Url::to(['/product/view', 'id' => $item->product_id]) ?>"><?= $item['name'] ?></a></td>
                    <td><?= $item['qty_item'] ?></td>
                    <td><?= $item['price'] . ' ' . $item['abr']?></td>
                    <td><?= $item['sum_item'] . ' ' . $item['abr']?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' =>
            [
                [
                    'attribute' => 'qty',
                    'value' =>  $model->qty . '<span> ед.</span>',
                    'format' => 'html',
                ],
                [
                    'attribute' => 'sum',
                    'value' =>  $model->sum . '<span> ' . $model->abr . '</span>',
                    'format' => 'html',
                ],
                //'abr',
                'name:ntext',
                'phone:ntext',
                'email:ntext',
                'address:ntext',
                //'id',
                'created_at',
                'updated_at',
                [
                    'attribute' => 'status',
                    'value' =>   !$model->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Завершен</span>',
                    'format' => 'html',
                ],

            ],
        ])
    ?>
</div>

