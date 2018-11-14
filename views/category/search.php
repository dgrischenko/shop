<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\components\SelectWidget;
use yii\widgets\LinkPager;
use app\modules\admin\models\Options;
use yii\widgets\Pjax;

?>

<?php
$price = Options::find()->where(['id' => "{$model['str']}"])->all()[0]
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
				<!--recommended_items-->
                <?php Pjax::begin(); ?>
				<div class="recommended_items">
                    <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q) ?></h2>
                    <?php if (!empty($products)): ?>
                        <?php $i = 0;
                        foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>">
                                                <?php $mainImg = $product->getImage(); ?>
                                                <?= Html::img($mainImg->getUrl('x284'), ['alt' => $product->name])?></a>

                                            <h2>
                                                <?= $product->price . ' ' . $product->abr ?>
                                            </h2>
                                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name ?></a></p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart cart"><i
                                                    class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if ($product->new) : ?>
                                            <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
                                        <?php endif; ?>
                                        <?php if ($product->sale) : ?>
                                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new']) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++ ?>
                            <?php if ($i % 3 == 0): ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <?= LinkPager::widget(['pagination' => $pages]);?>

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
                <?php Pjax::end(); ?>
				<!--/recommended_items-->
            </div>

            <div class="col-sm-12 padding-right">

                <!--sales_items-->
                <?php if (!empty($sales)): ?>
                    <div class="recommended_items">
                        <h2 class="title text-center">Акционные предложения</h2>
                        <?php foreach ($sales as $sale): ?>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <!--<a href="<?/*= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) */?>"><?/*=Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name]) */?></a>-->

                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $sale->id]) ?>">
                                                <?php $mainImg = $sale->getImage(); ?>
                                                <?= Html::img($mainImg->getUrl(), ['alt' => $sale->name])?></a>

                                            <h2>
                                                <?= $sale->price . ' ' . $sale->abr ?>
                                            </h2>
                                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $sale->id]) ?>"><?= $sale->name ?></a></p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $sale->id]) ?>" data-id="<?= $sale->id ?>" class="btn btn-default add-to-cart cart"><i
                                                        class="fa fa-shopping-cart"></i>В корзину</a>
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
                        <?php endforeach; ?>
                    </div>
                <?php endif;?>
                <!--/sales_items-->

                <!--news_items-->
                <?php if (!empty($news)): ?>
                    <div class="recommended_items">
                        <h2 class="title text-center">Новые поступления</h2>
                        <?php foreach ($news as $new): ?>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <!--<a href="<?/*= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) */?>"><?/*=Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name]) */?></a>-->

                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $new->id]) ?>">
                                                <?php $mainImg = $new->getImage(); ?>
                                                <?= Html::img($mainImg->getUrl('x284'), ['alt' => $new->name])?></a>

                                            <h2>
                                                <?= $new->price . ' ' . $new->abr ?>
                                            </h2>
                                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $new->id]) ?>"><?= $new->name ?></a></p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $new->id]) ?>" data-id="<?= $new->id ?>" class="btn btn-default add-to-cart cart"><i
                                                        class="fa fa-shopping-cart"></i>В корзину</a>
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
                        <?php endforeach; ?>
                    </div><!--recommended_items-->
                <?php endif;?>
                <!--news_items-->

                <!--hits_items-->
                <?php if (!empty($hits)): ?>
                    <div class="recommended_items">
                        <h2 class="title text-center">Хиты продаж</h2>
                        <?php foreach ($hits as $hit): ?>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                            <!--<a href="<? /*= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) */ ?>"><? /*=Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name]) */ ?></a>-->

                                            <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>">
                                                <?php $mainImg = $hit->getImage(); ?>
                                                <?= Html::img($mainImg->getUrl('x284'), ['alt' => $hit->name]) ?></a>

                                            <h2>
                                                <?= $hit->price . ' ' . $hit->abr ?>
                                            </h2>
                                            <p>
                                                <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= $hit->name ?></a>
                                            </p>
                                            <a href="<?= Url::to(['cart/add', 'id' => $hit->id]) ?>" data-id="<?= $hit->id ?>"
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