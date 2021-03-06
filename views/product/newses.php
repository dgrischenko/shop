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
                </div>
            </div>


            <div class="col-sm-9 padding-right">

                <!--news_items-->
                <div class="recommended_items">
                    <h2 class="title text-center">Новые поступления</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
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
                                                <a href="<?= Url::to(['product/view', 'id' => $new->id]) ?>">
                                                    <?php $mainImg = $new->getImage(); ?>
                                                    <?= Html::img($mainImg->getUrl('x284'), ['alt' => $new->name])?></a>
                                                <h2>
                                                    <?= $new->price . ' ' . $new->abr ?>
                                                </h2>
                                                <p>
                                                    <a href="<?= Url:: to(['product/view', 'id' => $new->id]) ?>"><?= $new->name ?></a>
                                                </p>
                                                <a href="<?= Url::to(['cart/add', 'id' => $new->id]) ?>"
                                                   data-id="<?= $new->id ?>"
                                                   class="btn btn-default add-to-cart cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    В корзину
                                                </a>
                                            </div>
                                            <?php if($new->new) :?>
                                                <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' =>'new']) ?>
                                            <?php endif; ?>
                                            <?php if($new->sale) :?>
                                                <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' =>'new']) ?>
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
                <!--/news_items-->
            </div>
            <div class="col-sm-12">
                <!--news_items-->
                <?php if (!empty($news)): ?>
                    <div class="recommended_items">
                        <h2 class="title text-center">Новинки</h2>
                        <?php foreach ($news as $new): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $new->id]) ?>">
                                                <?php $mainImg = $new->getImage(); ?>
                                                <?= Html::img($mainImg->getUrl('x284'), ['alt' => $new->name]) ?></a>

                                            <h2>
                                                <?= $new->price . ' ' . $new->abr ?>
                                            </h2>
                                            <p>
                                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $new->id]) ?>"><?= $new->name ?></a>
                                            </p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $new->id]) ?>" data-id="<?= $new->id ?>"
                                               class="btn btn-default add-to-cart cart"><i
                                                        class="fa fa-shopping-cart"></i>В корзину</a>
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
                        <?php endforeach; ?>
                    </div>
                <?php endif;?>
                <!--/news_items-->
            </div>
        </div>
    </div>
</section>