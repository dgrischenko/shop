<?php
use yii\helpers\Url;
?>

<!--brands_products-->
<div class="brands_products">
    <h2>Каталог</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
		<li><a href="<?= \yii\helpers\Url:: to(['product/sales', 'id' => $sale->id]) ?>"> <span class="pull-right"><?php if (!$counts == 0)echo '('?><?= $counts?><?php if (!$counts == 0)echo ')'?></span>Акционный товар</a></li>
            <li><a href="<?= \yii\helpers\Url:: to(['product/hitses', 'id' => $hit->id]) ?>"> <span class="pull-right"><?php if (!$counth == 0)echo '('?><?= $counth?><?php if (!$counth == 0)echo ')'?></span>Хиты продаж</a></li>
            <li><a href="<?= \yii\helpers\Url:: to(['product/newses', 'id' => $news->id]) ?>"> <span class="pull-right"><?php if (!$countn == 0)echo '('?><?= $countn?><?php if (!$countn == 0)echo ')'?></span>Новые поставки</a></li>
            
        </ul>
    </div>
</div>
<!--/brands_products-->