<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;
use yii\helpers\Url;
use yii\widgets\Pjax;


AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <!--    <meta name="description" content="">
                <meta name="author" content="">
         -->
        <title>Админка | <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
    <?php $this->beginBody() ?>


    <header id="header"><!--header-->
        <!--top-->
        <div class="container">
            <div class="row">
                <div class="top">
                    <div class="col-sm-9">
                        <div class="contactinfo pull-right">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +38 095 50 40 732</a></li>
                                <li><a href="<?= Url::to(['/site/contact']) ?>"><i class="fa fa-envelope"></i> shop@magazzilla.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="social-icons">
                            <ul class="social">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/top-->
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?= \yii\helpers\Url::home() ?>"><?= Html::img('@web/images/home/logo5.png', ['alt' => 'Интернет магазин "МагаZZilla"']) ?></a>
                        </div>
                        <div class="btn-group pull-right">


                            <div class="btn-group">

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right admin">
                            <ul class="nav navbar-nav">
                                <li><a href="<?= Url::home() ?>"><i class="fa fa-home"></i>На главную сайта</a></li>
                                <?php if (Yii::$app->user->isGuest) : ?>
                                    <li><a href="<?= Url::to(['/site/about']) ?>"><i class="fa fa-star"></i>О нас </a></li>
                                <?php endif; ?>
                                <li><a href="<?= Url::to(['/site/contact']) ?>"><i class="fa fa-book"></i> Контакты</a></li>
                                <!--<li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> Корзина</a></li>-->
                                <!--<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>-->
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <li><a href="<?= \yii\helpers\Url::to(['/site/logout']) ?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username'] ?> (Выход)</a></li>
                    <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">


                    <div class="col-sm-8">
                        <div class="shop-menu pull-right  ">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse admin">
                                    <li><a href="<?= \yii\helpers\Url::to(['/admin']) ?>">Заказы</a></li>
                                    <li class="dropdown"><a href="#">Категории<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="<?= \yii\helpers\Url::to(['category/index']) ?>">Список категорий</a></li>
                                            <li><a href="<?= \yii\helpers\Url::to(['category/create']) ?>">Добавить категорию</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Товары<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="<?= \yii\helpers\Url::to(['product/index']) ?>">Список  товаров</a></li>
                                            <li><a href="<?= \yii\helpers\Url::to(['product/create']) ?>">Добавить товар</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Опции<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="<?= \yii\helpers\Url::to(['options/index']) ?>">Курсы валют</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <div class="container">
        <?php if ( Yii::$app->session->hasFlash('success') ) : ?>
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>


        <?= $content ?>


    </div>

    <!--footer-->
    <div class="footer">
        <div class="container">
            <div class="footer-static-container">
                <div class="container">
                    <div class="footer-static row pt30 pb30">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="footer-static-content social-links">
                                <?= Html::img('@web/images/home/logo5.png', ['alt' => 'МагаZZila']) ?>
                                <p>Интернет-магазин элитного алкоголя</p>
                                <!--LiveInternet counter--><!--<script type="text/javascript">
                                    document.write("<a href='//www.liveinternet.ru/click' "+
                                        "target=_blank><img src='//counter.yadro.ru/hit?t18.15;r"+
                                        escape(document.referrer)+((typeof(screen)=="undefined")?"":
                                            ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                                            screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
                                        ";"+Math.random()+
                                        "' alt='' title='LiveInternet: показано число просмотров за 24"+
                                        " часа, посетителей за 24 часа и за сегодня' "+
                                        "border='0' width='88' height='31'><\/a>")
                                </script>--><!--/LiveInternet-->
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="footer-static-title">
                                <h3>Контакты</h3>
                            </div>
                            <div class="footer-static-content footer-add">
                                <div class="address2">г. Донецк,<br> Макеевское шоссе, 26</div>
                                <div class="phone2" style="border: none">
                                    (095) 50 40 732<br>
                                    <div class="mail2">
                                        <a href="<?= Url::to(['/site/contactform']) ?>">shop@magazzilla.com</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 hidden-sm col-xs-12">
                            <div class="footer-static-title">
                                <h3>О нас</h3>
                            </div>
                            <div class="footer-static-content">
                                <ul>

                                    <li class="first"><a href="<?= Url::to(['/site/contacts']) ?>">Контакты</a></li>
                                    <li class="first"><a href="<?= Url::to(['/site/about']) ?>">О нашем магазине</a></li>
                                    <li class="first"><a href="<?= Url::to(['/site/contact']) ?>">Написать нам</a></li>
                                    <!--<li><a href="#">Доставка и оплата</a></li>
                                    <li><a href="#">Гарантии и cертификаты</a></li>-->
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="footer-static-title">
                                <h3>График работы</h3>
                            </div>
                            <div class="footer-static-content footer-service">
                                <ul>
                                    <li class="first">
                                        Пн-Пт: 9:00-18:00
                                    </li>
                                    <li>
                                        Сб: 9:00-15:00
                                    </li>
                                    <li>
                                        Вс: выходной
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <footer class="ma-footer-container">
                    <div class="container">
                        <div class="row">
                            <div class="basak-footer">
                                <div class="col-md-4 pull-right">
                                    <div class="copyright">
                                        Разработка и сопровождение
                                        <a target="_blank" href="https://vk.com/id14791318">Dmitriy Grischenko</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!--/footer-->


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>

