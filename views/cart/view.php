<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

?>

<div class="container">
    <div class="col-sm-12">
    

    </div>
    <h2 class="title text-center">Оформление заказа</h2>
        <div class="site-contact">
        <?php if ( Yii::$app->session->hasFlash('success') ) : ?>
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>

        <?php if (Yii::$app->session->hasFlash('error')) : ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($session['cart'])): ?>
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Фото</th>
                        <th>Наименвание</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                        <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($session['cart'] as $id => $item): ?>
                        <tr>
                            <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                            <td><a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= $item['name'] ?></a></td>
                            <td><?= $item['qty'] ?></td>
                            <td><?= $item['price'] . ' ' . $item['abr']?></td>
                            <td><?= $item['price'] * $item['qty'] . ' ' . $item['abr']?></td>
                            <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item"
                                      aria-hidden="true"></span></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="5" align="right"><b>Итого единиц товара:</b></td>
                        <th><?= $session['cart.qty'] ?> шт.</th>
                    </tr>
                    <tr>
                        <td colspan="5" align="right"><b>Сумма итого:</b></td>
                        <th><?= $session['cart.sum'] ?> грн.</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <hr/>
            <?php $form = ActiveForm::begin() ?>
            <?= $form->field($order, 'name') ->textInput(['autofocus' => true]) ?>
            <?= $form->field($order, 'email') ?>
            <?= $form->field($order, 'phone')->widget(\yii\widgets\MaskedInput::className(),
            ['mask' => '+38 ( 999 ) 999 - 99 - 99',]) ?>
            <?= $form->field($order, 'address') ?>
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
            <hr/>
            <?php ActiveForm::end() ?>
        <?php else: ?>
            <h3>Корзина пуста</h3>
        <?php endif; ?>
    </div>
</div>

