<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 27.08.2018
 * Time: 9:54
 */

namespace app\controllers;
use app\models\ChangeForm;
use app\models\Product;
use app\modules\admin\models\Options;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use Yii;

class CartController extends AppController
{
    public function actionAdd(){
        $id = Yii::$app->request->get('id');
        $qty = abs((int)Yii::$app->request->get('qty'));
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        $this->layout = false;
        $model = new ChangeForm();
        if ( !Yii::$app->request->isAjax){
            return $this->redirect(Yii::$app->request->referrer);
        };
        return $this->render('cart-modal', compact('session', 'model'));
    }

    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $session->remove('cart.abr');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));

    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionShow(){
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionView(){
        $model = new ChangeForm();
        $quot = Options::find()->where(['title' => 'USD'])->all();
        $quota = Options::find()->where(['title' => 'EUR'])->all();
        $abr = '';
        $session = Yii::$app->session;
        $session->open();
        $this -> setMeta('Корзина');
        $order = new Order();
        if ($order->load(Yii::$app->request->post()) ){
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            $order->abr = $session['cart.abr'];
            if ($order->save()){
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Наш менеджер свяжется с Вами в ближайшее время.');
                Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom(['bigmandg@mail.ru' => 'Интернет магазин "МаgаZZiLLa"'])
                    ->setTo($order->email)
                    ->setSubject($order->name . ', Ваш заказ №' . $order->id . ' на сумму ' . $order->sum . ' рублей принят. Наш менеджер свяжется с Вами в ближайшее время.')
                    ->send();
                /*Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom(['bigmandg@mail.ru' => '"МаgаZZiLLa"'])
                    ->setTo('   ---------------------------------------------------------------------')
                    ->setSubject('Заказ')
                    ->send();*/
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                $session->remove('cart.abr');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа.');
            }
        }
        return $this->render('view', compact('session', 'order', 'model', 'quot', 'quota', 'abr' ));
    }


    protected function saveOrderItems($items, $order_id){
        foreach ($items as $id => $item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->abr = $item['abr'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }

}