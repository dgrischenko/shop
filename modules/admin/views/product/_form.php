<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?/*= $form->field($model, 'category_id')->textInput() */?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">Категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
        </select>
    </div>

    <?php
        /*echo $form->field($model, 'content')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
            ],
        ]);
    */?>

    <?php
    $img = $model->getImage();
    $gallery = $model->getImages();
     ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' =>
            [
                [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl('x284')}'>",
                'format' => 'html',
                ],
                /*' [
                 'attribute' => 'gallery',
               *'value' =>  function($gallery){
                     foreach ($gallery as $item) {
                         return $item;
                     }
                 },
                'format' => 'html',
                ],*/
]
    ]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
    'editorOptions' => ElFinder::ckeditorOptions('elfinder', [])
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?/*= $form->field($model, 'oldprice')->textInput() */?>

    <?= $form->field($model, 'abr')->dropDownList(['₽' => '₽', '$' => '$', '€' => '€', 'UAN' => 'UAN']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) */?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1']) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1']) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1']) ?>

    <?= $form->field($model, 'isset')->checkbox([ '1', '0']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
