<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\SelectWidget;
use app\modules\admin\models\Options;

?>

<?php
if (isset($model['str'])) {
    $price = Options::find()->where(['id' => "{$model['str']}"])->all()[0];
}
$model['str'] = '3';
$price = Options::find()->where(['id' => "{$model['str']}"])->all()[0];
?>
<?= SelectWidget::widget(['name' => 'selectr']); ?>
<section>
    <div class="container">
        <div class="row">
            <?php
            $mainImg = $product->getImage();
            //$gallery = $product->getImages();
            ?>
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <?php menu_category() ?>
                    <?= $this->render('../layouts/brandsr', compact('counth', 'countn', 'counts')) ?>
                </div>
            </div>
            <div class="col-sm-3">
                <!--product-details-->
                <div class="product-details">
                    <div class="view-product">
                        <?= Html::img($mainImg->getUrl(), ['alt' => $product->name]) ?>
                        <!-- <h3>ZOOM</h3>-->
                    </div>
                    <?php if ($product->sale) : ?>
                        <?= Html::img("@web/images/home/sale2.png", ['alt' => 'Распродажа', 'class' => 'newarrival']) ?>
                    <?php endif; ?>
                    <div id="similar-product" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <!-- <div class="carousel-inner">
                                <?php /*$count = count($gallery); $i = 0; foreach ($gallery as $img) : */ ?>
                                    <?php /*if($i % 3 == 0) : */ ?>
                                        <div class="item <?php /*if ($i == 0) echo ' active'*/ ?>">
                                    <?php /*endif; */ ?>
                                        <a href=""><? /*= Html::img($img->getUrl('84x85'), ['alt'=> '']) */ ?></a>
                                    <?php /*$i++; if($i % 3 == 0 || $i == $count ): */ ?>
                                        </div>
                                    <?php /*endif; */ ?>
                                <?php /*endforeach; */ ?>
                            </div>  -->

                        <!-- Controls -->
                        <!--   <a class="left item-control" href="#similar-product" data-slide="prev">
                               <i class="fa fa-angle-left"></i>
                           </a>
                           <a class="right item-control" href="#similar-product" data-slide="next">
                               <i class="fa fa-angle-right"></i>
                           </a>-->
                    </div>
                </div>
                <!--/product-details-->
            </div>
            <div class="col-sm-6 padding-right">
                <!--product-information-->
                <div class="product-information">
                    <?php if ($product->new) : ?>
                        <?= Html::img("@web/images/product-details/new.jpg", ['alt' => 'Новинка', 'class' => 'newarr']) ?>
                    <?php endif; ?>

                    <h2><?= $product->name ?></h2>
                    <p>Категория: <a
                                href="<?= \yii\helpers\Url::to(['category/viewr', 'id' => $product->category->id]) ?>"><?= $product->category->name ?>&trade;</a>
                    </p>
                    <p>Артикул: <?= $product->id + $product->price * 2 * 20 ?></p>
                    <!--                            <img src="/images/product-details/rating.png" alt="" />-->
                    <span>
                        <span>
                             <?= round($product->price / $price['api']) . ' ' . $price->title ?>
                        </span>
                        <label>Количество:</label>
                        <input type="text" value="1" id="qty"/>
                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>"
                           data-id="<?= $product->id ?>" class="btn btn-default add-to-cart cart">
                            <i class="fa fa-shopping-cart"></i>
                            В корзину
                        </a>
                    </span>
                    <p><b>Наличие:</b>
                        <?php if ($product->isset == 1) {
                            echo 'Есть на складе!!!';
                        } elseif ($product->isset == 0) {
                            echo 'Ивините, товара нет. Ожидается поступление на склад';
                        } ?>
                    </p>

                    <!--<a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>-->


                    <!-- <?php /*if ($product->new) : */ ?>
                        <? /*= Html::img("@web/images/product-details/new.jpg", ['alt' => 'Новинка', 'class' => 'newarrival']) */ ?>
                    --><?php /*endif; */ ?>

                    <div class="product-information2">
                        <?= $product->content ?>
                    </div>
                </div><!--/product-information-->
            </div>

            <div class="col-sm-12">
                <!--news_items-->
                <div class="recommended_items">
                    <h2 class="title text-center">Новые поступления</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $count = count($news);
                            $i = 0;
                            foreach ($news as $new): ?>
                                <?php if ($i % 4 == 0): ?>
                                    <div class="item <?php if ($i == 0) echo "active"; ?>">
                                <?php endif; ?>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="<?= \yii\helpers\Url::to(['product/viewr', 'id' => $new->id]) ?>">
                                                    <?php $mainImg = $new->getImage(); ?>
                                                    <?= Html::img($mainImg->getUrl('x284'), ['alt' => $new->name]) ?></a>
                                                <h2>
                                                    <?= round($new->price / $price['api']) . ' ' . $price->title ?>
                                                </h2>
                                                <p>
                                                    <a href="<?= \yii\helpers\Url:: to(['product/viewr', 'id' => $new->id]) ?>"><?= $new->name ?></a>
                                                </p>
                                                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $new->id]) ?>"
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
                <!--/news_items-->

                <!--hits_items-->
                <div class="recommended_items">
                    <h2 class="title text-center">Хиты продаж</h2>

                    <div id="recommended-item-carousel3" class="carousel slide" data-ride="carousel3">
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
                                                <a href="<?= \yii\helpers\Url::to(['product/viewr', 'id' => $hit->id]) ?>">
                                                    <?php $mainImg = $hit->getImage(); ?>
                                                    <?= Html::img($mainImg->getUrl('x284'), ['alt' => $hit->name]) ?></a>
                                                <h2>
                                                    <?= round($hit->price / $price['api']) . ' ' . $price->title ?>
                                                </h2>
                                                <p>
                                                    <a href="<?= \yii\helpers\Url:: to(['product/viewr', 'id' => $hit->id]) ?>"><?= $hit->name ?></a>
                                                </p>
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

                <!--sales_items-->
                <div class="recommended_items">
                    <h2 class="title text-center">Акционные предложения</h2>

                    <div id="recommended-item-carousel2" class="carousel slide" data-ride="carousel2">
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
                                                <a href="<?= \yii\helpers\Url::to(['product/viewr', 'id' => $sale->id]) ?>">
                                                    <?php $mainImg = $sale->getImage(); ?>
                                                    <?= Html::img($mainImg->getUrl('x284'), ['alt' => $sale->name]) ?></a>
                                                <h2>
                                                    <?= round($sale->price / $price['api']) . ' ' . $price->title ?>
                                                </h2>
                                                <p>
                                                    <a href="<?= \yii\helpers\Url:: to(['product/viewr', 'id' => $sale->id]) ?>"><?= $sale->name ?></a>
                                                </p>
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
                <!--/sales_items-->
            </div>
        </div>
    </div>
</section>
