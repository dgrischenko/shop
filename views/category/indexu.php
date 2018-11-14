<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\MenuWidget;
use app\components\SelectWidget;
use app\modules\admin\models\Options;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>

<?php
$price = Options::find()->where(['id' => "{$model['str']}"])->all()[0]
?>
<?= SelectWidget::widget(['name' => 'selectu']);?>

<!--slider-->
<section id="slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-4 names">
                                <h3>МагаZZiLLa - <span>магазин №1 алкогольнй продукции.</span></h3>
                                <p>Наш интернет-магазин предоставляет вам уникальную возможность продегустировать благородный,
                                    качественный алкоголь по доступным, низким ценам. Предлагаем вам приобрести элитные алкогольные напитки
                                    в современной упаковке (тетрапак, на разлив, в пластике и т.д).
                                    Благодаря таким объемам вы можете разделить эту приятную дегустацию с вашими друзьями и знакомыми,
                                    приготовить множество коктейлей, отметить памятную дату и т.д.</p>
                                <!--<button class="button-slider" type="button" class="btn btn-default get">Подробнее...</button>-->
                            </div>
                            <div class="col-sm-8 ">
                                <img src="/images/home/header.png" class="girl img-responsive padding-right" alt=""/>
                                <!--<img src="/images/home/pricing.png" class="pricing" alt=""/>-->
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-4 names">
                                <h3>МагаZZiLLa - <span>магазин №1 алкогольнй продукции.</span></h3>
                                <p>Истинные ценители элитных алкогольных напитков выбирают интернет-магазин «МагаZZiLLa».
                                    Мы занимаемся реализацией высококачественного алкоголя премиум-класса от лучших производителей
                                    с мировым именем.<br/>
                                    К преимуществам сотрудничества с нашим интернет-магазином алкоголя относятся:<br>
                                    - доступная ценовая политика,<br>
                                    - эксклюзивные алкогольные напитки,
                                    - сертифицированный товар.<br></p>
                                <!--<button class="button-slider" type="button" class="btn btn-default get">Подробнее...</button>-->
                            </div>
                            <div class="col-sm-8">
                                <img src="/images/home/header6.jpg" class="girl img-responsive padding-right" alt=""/>
                                <!--<img src="/images/home/pricing.png" class="pricing" alt=""/>-->
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-4 names">
                                <h3>МагаZZiLLa - <span>магазин №1 алкогольнй продукции.</span></h3>
                                <p>Вы можете заказать как одну позицию, так и несколько, оптом и в розницу.<br>
                                    Сделать заказ в нашем интернет-магазине можно в любое удобное для вас время дня и ночи.<br>
                                    Ваш заказ будет обработан в максимально короткий срок в течении рабочего дня.<br>
                                    В случае возникновения любых вопросов по товару вы можете позвонить нам
                                    по телефону или написать нам на эл. адрес указанный на сайте.
                                </p>
                                <!-- <button class="button-slider" type="button" class="btn btn-default get">Подробнее...</button>-->
                            </div>
                            <div class="col-sm-8">
                                <img src="/images/home/header3.jpg" class="girl img-responsive padding-right" alt=""/>
                                <!--      <img src="/images/home/pricing.png" class="pricing" alt=""/>-->
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <?php menu_category() ?>
                    <?= $this->render('../layouts/brandsu', compact('counth','countn','counts')) ?>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <!--news_items-->
                <div class="recommended_items">
                    <h2 class="title text-center">Новые поступления</h2>

                    <div id="recommended-item-carousel2" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $count = count($news);
                            $i = 0;
                            foreach ($news as $new): ?>
                                <?php if ($i % 3 == 0): ?>
                                    <div class="item <?php if ($i == 0) echo "active"; ?>">
                                <?php endif; ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="<?= \yii\helpers\Url::to(['product/viewu', 'id' => $new->id]) ?>">
                                                    <?php $mainImg = $new->getImage(); ?>
                                                    <?= Html::img($mainImg->getUrl('x284'), ['alt' => $new->name]) ?></a>
                                                <h2>
                                                    <?= round($new->price / $price['api'], 2) . ' ' . $price->title ?>
                                                </h2>
                                                <p>
                                                    <a href="<?= Url:: to(['product/viewu', 'id' => $new->id]) ?>"><?= $new->name ?></a>
                                                </p>
                                                <?php
                                                echo $price->abr
                                                ?>
                                                <a href="<?= Url::to(['cart/add', 'id' => $new->id]) ?>"
                                                   data-id="<?= $new->id ?>"
                                                   class="btn btn-default add-to-cart cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    В корзину
                                                </a>
                                            </div>
                                            <?php if ($new->new) : ?>
                                                <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
                                            <?php endif; ?>
                                            <?php if ($new->sale) : ?>
                                                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new']) ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++;
                                if ($i % 3 == 0 || $i == $count): ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel2"
                           data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel2"
                           data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/news_items-->
            </div>
        </div>
        <!--hits_items-->
        <div class="recommended_items">
            <h2 class="title text-center">Хиты продаж</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $count = count($hits);
                    $i = 0;
                    foreach ($hits as $hit): ?>
                        <?php if ($i % 4 == 0): ?>
                            <div class="item <?php if ($i == 0) echo "active"; ?>">
                        <?php endif; ?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="<?= \yii\helpers\Url::to(['product/viewu', 'id' => $hit->id]) ?>">
                                            <?php $mainImg = $hit->getImage(); ?>
                                            <?= Html::img($mainImg->getUrl('x284'), ['alt' => $hit->name]) ?></a>
                                        <h2>
                                            <?= round($hit->price / $price['api'], 2) . ' ' . $price->title ?>
                                        </h2>
                                        <p>
                                            <a href="<?= \yii\helpers\Url:: to(['product/viewu', 'id' => $hit->id, 'set' => 1]) ?>"><?= $hit->name ?></a>
                                        </p>
                                        <?php
                                        echo $price->abr
                                        ?>
                                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id]) ?>"
                                           data-id="<?= $hit->id ?>"
                                           class="btn btn-default add-to-cart cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++;
                        if ($i % 4 == 0 || $i == $count): ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel"
                   data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel"
                   data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <!--/hits_items-->

        <!--sales_items-->
        <div class="recommended_items">
            <h2 class="title text-center">Акционные предложения</h2>

            <div id="recommended-item-carousel3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $count = count($sales);
                    $i = 0;
                    foreach ($sales as $sale): ?>
                        <?php if ($i % 4 == 0): ?>
                            <div class="item <?php if ($i == 0) echo "active"; ?>">
                        <?php endif; ?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="<?= \yii\helpers\Url::to(['product/viewu', 'id' => $sale->id]) ?>">
                                            <?php $mainImg = $sale->getImage(); ?>
                                            <?= Html::img($mainImg->getUrl('x284'), ['alt' => $sale->name]) ?></a>
                                        <h2>
                                            <?= round($sale->price / $price['api'], 2) . ' ' . $price->title ?>
                                        </h2>
                                        <p>
                                            <a href="<?= \yii\helpers\Url:: to(['product/viewu', 'id' => $sale->id]) ?>"><?= $sale->name ?></a>
                                        </p>
                                        <?php
                                        echo $price->abr
                                        ?>
                                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $sale->id]) ?>"
                                           data-id="<?= $sale->id ?>"
                                           class="btn btn-default add-to-cart cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </a>
                                    </div>
                                    <?php if ($sale->new) : ?>
                                        <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
                                    <?php endif; ?>
                                    <?php if ($sale->sale) : ?>
                                        <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new']) ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php $i++;
                        if ($i % 4 == 0 || $i == $count): ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel3"
                   data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel3"
                   data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <!--/sales_items-->

    </div>
</section>
