<?php
use yii\helpers\Html;


/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
        <h3>Мы благодарим Вас, за сделанный заказ в нашем магазине!<br/>
        Проверьте, пожалуйста, правильность Вашего заказа</h3>
       <?= $content ?>
    <h4>С уважением, коллектив интернет-магазина "МагаZZiLLa"! </h4>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
