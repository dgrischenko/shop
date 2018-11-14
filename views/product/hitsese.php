<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\SelectWidget;
use app\modules\admin\models\Options;


?>

<?php
if (isset($model['str'])) {
    $price = Options::find()->where(['id' => "{$model['str']}"])->all()[0];
}
$model['str'] = '2';
$price = Options::find()->where(['id' => "{$model['str']}"])->all()[0];
?>
<?= SelectWidget::widget(['name' => 'selecte']);?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <?php menu_category() ?>
                    <?=  $this->render('../layouts/brandse', compact('counth','countn','counts'))?>
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
                                                <a href="<?= Url::to(['product/viewe', 'id' => $hit->id]) ?>">
                                                    <?php $mainImg = $hit->getImage(); ?>
                                                    <?= Html::img($mainImg->getUrl('x284'), ['alt' => $hit->name])?></a>
                                                <h2>
                                                    <?= round($hit->price / $price['api'], 2) . ' ' . $price->title ?>
                                                </h2>
                                                <p>
                                                    <a href="<?= Url:: to(['product/viewe', 'id' => $hit->id]) ?>"><?= $hit->name ?></a>
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
                                            <a href="<?= \yii\helpers\Url::to(['product/viewe', 'id' => $hit->id]) ?>">
                                                <?php $mainImg = $hit->getImage(); ?>
                                                <?= Html::img($mainImg->getUrl('x284'), ['alt' => $hit->name]) ?></a>

                                            <h2>
                                                <?= round($hit->price / $price['api'], 2) . ' ' . $price->title ?>
                                            </h2>
                                            <p>
                                                <a href="<?= \yii\helpers\Url::to(['product/viewe', 'id' => $hit->id]) ?>"><?= $hit->name ?></a>
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