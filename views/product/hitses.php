<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\SelectWidget;
?>


<?= SelectWidget::widget();?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <?php menu_category() ?>
                    <?=  $this->render('../layouts/brands', compact('counth','countn','counts'))?>
                    <!--price-range-->
                    <!--<div class="price-range">
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>-->
                        <!--/price-range-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">

                <!--hits_items-->
                <div class="recommended_items">
                    <h2 class="title text-center">Хиты продаж</h2>

                    <div id="recommended-item-carousel3" class="carousel slide" data-ride="carousel3">
                        <div class="carousel-inner">
                            <?php $count = count($hits);
                            $i = 0;
                            foreach ($hits as $hit): ?>
                                <?php if ($i % 3 == 0): ?>
                                    <div class="item <?php if ($i == 0) echo "active"; ?>">
                                <?php endif; ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="<?= Url::to(['product/view', 'id' => $hit->id]) ?>">
                                                    <?php $mainImg = $hit->getImage(); ?>
                                                    <?= Html::img($mainImg->getUrl('x284'), ['alt' => $hit->name])?></a>
                                                <h2>
                                                    <?= $hit->price . ' ' . $hit->abr ?>
                                                </h2>
                                                <p>
                                                    <a href="<?= Url:: to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name ?></a>
                                                </p>
                                                <a href="<?= Url::to(['cart/add', 'id' => $hit->id]) ?>"
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
                                if ($i % 3 == 0 || $i == $count): ?>
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
                <!--/hits_items-->

            </div>
            <div class="col-sm-12">
                <!--hits_items-->
                <?php if (!empty($hits)): ?>
                    <div class="recommended_items">
                        <h2 class="title text-center">Хиты продаж</h2>
                        <?php foreach ($hits as $hit): ?>
                            <div class="col-sm-4    ">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>">
                                                <?php $mainImg = $hit->getImage(); ?>
                                                <?= Html::img($mainImg->getUrl('x284'), ['alt' => $hit->name]) ?></a>

                                            <h2>
                                                <?= $hit->price . ' ' . $hit->abr ?>
                                            </h2>
                                            <p>
                                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name ?></a>
                                            </p>
                                            <a href="#" data-id="<?= $hit->id ?>"
                                               class="btn btn-default add-to-cart cart"><i
                                                        class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if ($hit->new) : ?>
                                            <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
                                        <?php endif; ?>
                                        <?php if ($hit->sale) : ?>
                                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new']) ?>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif;?>
                <!--/hits_items-->
            </div>
        </div>
    </div>
</section>