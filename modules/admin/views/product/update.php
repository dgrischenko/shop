<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Сохранить';
?>
<div class="product-update">



    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Вернуться к списку товаров', ['index'], ['class' => 'btn btn-success']) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
