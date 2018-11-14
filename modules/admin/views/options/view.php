<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Options */

$this->title = $model->name;
?>

<div class="category-view">

<!--    --><?php
/*    print_arr($course_current);
    print_arr($course_curr);
    print_arr($model['value']);
    print_arr($model['api']);
    */?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить курс', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить курс', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны, что хотите удалить эту категорию?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Вернуться в список валют', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'name',
           // 'value',
            'api',
        ],
    ])

    ?>
    <?= '  На данный момент ' . $model->name . ' составляет - ' . $course_current . ' грн.'; ?>
</div>
