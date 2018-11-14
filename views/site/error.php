<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<div class="container">
    <div class="site-error">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>
        <img src="" alt="">
        <a href="<?= Url::to(['/']) ?>"><?= Html::img('@web/images/404/404.png', ['alt' => 'OPPS! We Couldn’t Find this Page']) ?></a>
        <p>
            Вышеупомянутая ошибка возникла, когда веб-сервер обрабатывал ваш запрос.
        </p>
        <p>
            Если вы считаете, что это ошибка сервера, свяжитесь с нами. Спасибо.
        </p>


    </div>
</div>