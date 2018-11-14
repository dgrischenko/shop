<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container" xmlns="http://www.w3.org/1999/html">
    <h2 class="title text-center"><?= Html::encode($this->title) ?></h2>
    <div class="site-contact">
        <div class="main-content">
            <div class="about-us-area pt10 pb50">
                <div class="container">
                    <div class="row pt20">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="color: #000;">Телефоны:</h4>
                                    <ul class="list-unstyled">
                                        <li><strong>(095) 504-07-32</strong> | Vodafone</li>

                                                                        </ul>

                                    <h4 style="color: #000;margin-top: 20px">График работы</h4>
                                    <div class="custom-widget">
                                        <dl class="dl-horizontal timetable">
                                            <dt>Пн-Пт:</dt><dd>9:00-18:00</dd>
                                            <dt>Сб:</dt><dd>9:00-15:00</dd>
                                            <dt>Вс:</dt><dd>выходной</dd>
                                        </dl>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <address>
                                        <h4 style="color: #000;">Наш адрес</h4>
                                        <p>г.Донецк<br>
                                            Макеевское шоссе, 26                                    </p>
                                    </address>

                                    <h4 style="color: #000;">Почта:</h4>
                                    <ul class="list-unstyled">
                                        <li><a href="<?= Url::to(['/site/contact']) ?>" class="color-orange">shop@magazzilla.com</a></li>
                                    </ul>

                                    <h4 style="color: #000; margin-top: 20px">Фасад магазина:</h4>
                                    <a class="magnific-image-popup" href="https://www.google.com/maps/place/%D0%9C%D0%B0%D0%BA%D1%96%D1%97%D0%B2%D1%81%D1%8C%D0%BA%D0%B5+%D1%88%D0%BE%D1%81%D0%B5,+26,+%D0%94%D0%BE%D0%BD%D0%B5%D1%86%D1%8C%D0%BA,+%D0%94%D0%BE%D0%BD%D0%B5%D1%86%D1%8C%D0%BA%D0%B0+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+83000/@48.0038555,37.8719419,3a,75y,147.43h,87.7t/data=!3m7!1e1!3m5!1sX7eWhzeXJscYYAQ-KQ_Ikg!2e0!3e11!7i13312!8i6656!4m5!3m4!1s0x40e091dd41d42a5f:0x5450c7cd0ca4bc32!8m2!3d48.003622!4d37.871271?hl=ru">
                                        <img style="width: 100%; max-width: 640px" src="/images/home/fasad.jpg" >
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4 style="color: #000;">Расположение на карте</h4>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3174.6101567975784!2d37.86801464997245!3d48.00369562400732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40e091dd41d42a5f%3A0x5450c7cd0ca4bc32!2z0JzQsNC60ZbRl9Cy0YHRjNC60LUg0YjQvtGB0LUsIDI2LCDQlNC-0L3QtdGG0YzQuiwg0JTQvtC90LXRhtGM0LrQsCDQvtCx0LvQsNGB0YLRjCwgODMwMDA!5e0!3m2!1sru!2sua!4v1539778117586" width="90%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
