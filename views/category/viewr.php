<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\SelectWidget;
use app\modules\admin\models\Options;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

?>

<?php
if (isset($model['str'])) {
    $price = Options::find()->where(['id' => "{$model['str']}"])->all()[0];
}
$model['str'] = '3';
$price = Options::find()->where(['id' => "{$model['str']}"])->all()[0];
?>
<?= SelectWidget::widget(['name' => 'selectr']);?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <?php menu_category() ?>
                    <?=  $this->render('../layouts/brandsr', compact('counth','countn','counts'))?>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <!--category-->

                <div class="recommended_items">
                    <h2 class="title text-center"><?= $category->name ?></h2>
                    <?php if (!empty($products)): ?>
                        <?php $i = 0;
                        foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="<?= \yii\helpers\Url::to(['product/viewr', 'id' => $product->id]) ?>">
                                                <?php $mainImg = $product->getImage(); ?>
                                                <?= Html::img($mainImg->getUrl('x284'), ['alt' => $product->name])?></a>
                                            <h2>
                                                <?= round($product->price / $price['api']) . ' ' . $price->title ?>
                                            </h2>
                                            <p>
                                                <a href="<?= \yii\helpers\Url::to(['product/viewr', 'id' => $product->id]) ?>"><?= $product->name ?></a>
                                            </p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>"
                                               class="btn btn-default add-to-cart cart"><i
                                                        class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if ($product->new) : ?>
                                            <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
                                        <?php endif; ?>
                                        <?php if ($product->sale) : ?>
                                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'sale']) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++ ?>
                            <?php if ($i % 4 == 0): ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <?= LinkPager::widget(['pagination' => $pages,]);?>

                    <?php else: ?>
                        <div class="text_notfind"> 
								<h1><br/>Ничего не найдено!</h1><br/><br/>
								<p>К сожалению, по Вашему запросу товаров в нашем интернет-магазине не найдено!<br/>
								Ниже Вам доступны наши предложения на новинки, популярный товар, <br/>а также товар, на который действует акционная цена!<br/><br/>
								Также Вы можете воспользоваться формой обратной связи<br/> для уточнения необходимой информации.
								</p>
							</div>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </div>
                <!--category-->
            </div>
        </div>
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
                                        <a href="<?= Url::to(['product/viewr', 'id' => $new->id]) ?>">
                                            <?php $mainImg = $new->getImage(); ?>
                                            <?= Html::img($mainImg->getUrl('x284'), ['alt' => $new->name])?></a>
                                        <h2>
                                            <?= round($new->price / $price['api']) . ' ' . $price->title ?>
                                        </h2>
                                        <p>
                                            <a href="<?= Url:: to(['product/viewr', 'id' => $new->id]) ?>"><?= $new->name ?></a>
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
                                        <a href="<?= Url::to(['product/viewr', 'id' => $hit->id]) ?>">
                                            <?php $mainImg = $hit->getImage(); ?>
                                            <?= Html::img($mainImg->getUrl('x284'), ['alt' => $hit->name])?></a>
                                        <h2>
                                            <?= round($hit->price / $price['api']) . ' ' . $price->title ?>
                                        </h2>
                                        <p>
                                            <a href="<?= Url:: to(['product/viewr', 'id' => $hit->id]) ?>"><?= $hit->name ?></a>
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
                                        <a href="<?= Url::to(['product/viewr', 'id' => $sale->id]) ?>">
                                            <?php $mainImg = $sale->getImage(); ?>
                                            <?= Html::img($mainImg->getUrl('x284'), ['alt' => $sale->name])?></a>

                                        <h2>
                                            <?= round($sale->price / $price['api']) . ' ' . $price->title ?>
                                        </h2>
                                        <p>
                                            <a href="<?= Url:: to(['product/viewr', 'id' => $sale->id]) ?>"><?= $sale->name ?></a>
                                        </p>
                                        <a href="<?= Url::to(['cart/add', 'id' => $sale->id]) ?>"
                                           data-id="<?= $sale->id ?>"
                                           class="btn btn-default add-to-cart cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </a>
                                    </div>
                                    <?php if($sale->new) :?>
                                        <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' =>'new']) ?>
                                    <?php endif; ?>
                                    <?php if($sale->sale) :?>
                                        <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' =>'new']) ?>
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
</section>