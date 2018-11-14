<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Написать нам';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container" xmlns="http://www.w3.org/1999/html">
    <h2 class="title text-center"><?= Html::encode($this->title) ?></h2>
    <div class="site-contact">
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Благодарим Вас за обращение к нам. Мы ответим Вам в кратчайшие сроки.
        </div>

        <p>
            Обратите внимание: если вы включите отладчик Yii, то Вы сможете<br/>
            просматривать почтовые сообщения на почтовой панели отладчика. <br/>
            Спасибо, что обратились к нам. Мы ответим вам как можно скорее.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Поскольку приложение находится в режиме разработки, письмо не отправляется, а сохраняется как
                файл под <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <h2>
            Если у вас есть деловые или другие вопросы, пожалуйста,
 <br/>заполните следующую форму, чтобы связаться с нами.
        </h2>
        <h3>Заранее благодарны.</h3>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->label('Ваше имя')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email')->label('E-mail') ?>

                    <?= $form->field($model, 'subject')->label('Тема сообщения') ?>

                    <?= $form->field($model, 'body')->label('Текст сообщения')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->label('Введите символы с картинки:')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
    <?php endif; ?>
</div>
