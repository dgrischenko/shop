<div class="table-responsive">
    <table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse" class="table table-hover table-striped">
        <thead>
        <tr style="background: #f9f9f9;">
            <th style="padding: 8px; border: 1px solid #ddd;">Наименвание</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $item): ?>
            <tr>
               <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['name'] ?></td>
               <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty'] ?> шт.</td>
               <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price'] ?> грн.</td>
               <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['price'] * $item['qty'] ?> грн.</i></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="3" align="right" style="padding: 8px; border: 1px solid #ddd;">Итого единиц товара :</th>
            <th style="padding: 8px; border: 1px solid #ddd;"><?=$session['cart.qty'] ?> шт.</th>
        </tr>
        <tr>
            <th colspan="3" align="right" style="padding: 8px; border: 1px solid #ddd;">Сумма итого:</th>
            <th style="padding: 8px; border: 1px solid #ddd;"><?=$session['cart.sum'] ?> грн.</i></th>
        </tr>
        </tbody>

    </table>
</div>