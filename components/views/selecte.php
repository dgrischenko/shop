<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>

<?php $this->beginBlock('select'); ?>
<div class="left-sidebar for-select">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'str')->dropDownList([
        '0' => '₴ Гривна',
        '1' => '$ Доллар',
        '2' => '€ Евро',
        '3' => '₽ Рубль',
    ],
        $params = [
            'options' => ['2' => ['Selected' => true]],
        ]);
    ?>
    <?= Html::submitButton('Применить'); ?>
    <span> Цены на сайте указаны в евро (справочно). </span>
    <?php ActiveForm::end(); ?>

</div>
<?php $this->endBlock(); ?>
