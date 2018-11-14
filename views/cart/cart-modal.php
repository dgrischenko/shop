<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive bord">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименвание</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Сумма</th>
                    <th>Удалить</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item): ?>
                <tr>
                    <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] . ' ' . $item['abr']?></td>
                    <td><?= $item['price'] * $item['qty'] . ' ' . $item['abr']?></td>
                    <td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="5" align="right"><b>Итого единиц товара :</b></td>
                    <th><?=$session['cart.qty'] ?> шт.</th>
                </tr>
                <tr>
                    <td colspan="5" align="right"><b>Сумма итого:</b></td>
                    <th><?=$session['cart.sum'] ?> грн.</th>
                </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
