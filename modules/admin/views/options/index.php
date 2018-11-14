<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курс валют';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php
   /* $course_current = get_course();
    $course_curr = (float)$course_current;*/
//if( $course_curr && (int)$course_curr != $model['value'] ){
//if( update_course($course_curr) ) $model['value'] = $course_curr;
//}
?>


<div class="category-index">
<!--    --><?php
/*    print_arr($course_current);
    print_arr($course_curr);
    print_arr($model['value']);
    print_arr($model['api']);
    */?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую валюту', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить курс доллара', ['view', 'id' => 1], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Изменить курс доллара', ['update', 'id' => 1], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       /*     'id',*/
            'title',
            'name' ,
            //'value',
            'api',

            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>
    <?= '  На данный момент курс доллара составляет - ' . $course_current . ' грн.'; ?>
</div>