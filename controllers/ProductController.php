<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 27.08.2018
 * Time: 0:25
 */

namespace app\controllers;
use app\models\Category;
use app\models\ChangeForm;
use app\models\Image;
use app\models\Product;
use Yii;
use yii\helpers\Url;
use yii\web\HttpException;
use app\modules\admin\models\Options;


class ProductController extends AppController {

    public function actionView($id) {
 //   $id = Yii::$app->request->get('id');
    $product = Product::findOne($id);
        if( empty($product))
            throw new HttpException(404, 'Такого товара нет' );
        $model = new ChangeForm();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        //$image = Image::findOne()->where(['id' => $id])->all();
        $this->setMeta('МагаZZilla | '. $product ->name, $product->keywords, $product->description);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('viewu', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            } elseif ($model['str'] == 2){
                return $this->render('viewe', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            } elseif ($model['str'] == 3){
                return $this->render('viewr', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            };
        };
        return $this->render('view', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
    }

    public function actionViewe($id) {
        //   $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if( empty($product))
            throw new HttpException(404, 'Такого товара нет' );
        $model = new ChangeForm();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        //$image = Image::findOne()->where(['id' => $id])->all();
        $this->setMeta('МагаZZilla | '. $product ->name, $product->keywords, $product->description);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('viewu', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            } elseif ($model['str'] == 0){
                return $this->render('view', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            } elseif ($model['str'] == 3){
                return $this->render('viewr', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            };
        };
        return $this->render('viewe', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
    }

    public function actionViewu($id) {
        //   $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if( empty($product))
            throw new HttpException(404, 'Такого товара нет' );
        $model = new ChangeForm();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        //$image = Image::findOne()->where(['id' => $id])->all();
        $this->setMeta('МагаZZilla | '. $product ->name, $product->keywords, $product->description);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 0){
                return $this->render('view', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            } elseif ($model['str'] == 2){
                return $this->render('viewe', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            } elseif ($model['str'] == 3){
                return $this->render('viewr', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            };
        };
        return $this->render('viewu', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
    }

    public function actionViewr($id) {
        //   $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if( empty($product))
            throw new HttpException(404, 'Такого товара нет' );
        $model = new ChangeForm();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        //$image = Image::findOne()->where(['id' => $id])->all();
        $this->setMeta('МагаZZilla | '. $product ->name, $product->keywords, $product->description);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('viewu', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            } elseif ($model['str'] == 2){
                return $this->render('viewe', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            } elseif ($model['str'] == 0){
                return $this->render('view', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
            };
        };
        return $this->render('viewr', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'product', 'model'));
    }



    public function actionHitses()
{
    $model = new ChangeForm();
    $news = Product::find()->where(['new' => '1'])->all();
    $sales = Product::find()->where(['sale' => '1'])->all();
    $hits = Product::find()->where(['hit' => '1'])->all();
    $counth = Product::find()->where(['hit' => '1'])->count();
    $countn = Product::find()->where(['new' => '1'])->count();
    $counts = Product::find()->where(['sale' => '1'])->count();
    $this->setMeta('МагаZZiLLa | '. 'Хиты продаж');
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        if ($model['str'] == 1){
            return $this->render('hitsesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
        }
        elseif ($model['str'] == 2){
            return $this->render('hitsese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
        }
        elseif ($model['str'] == 3){
            return $this->render('hitsesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
        };
    };
    return $this->render('hitses', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
}

    public function actionHitsese()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Хиты продаж');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('hitsesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 0){
                return $this->render('hitses', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 3){
                return $this->render('hitsesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('hitsese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }

    public function actionHitsesu()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Хиты продаж');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 0){
                return $this->render('hitses', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('hitsese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 3){
                return $this->render('hitsesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('hitsesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }

    public function actionHitsesr()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Хиты продаж');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('hitsesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('hitsese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 0){
                return $this->render('hitses', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('hitsesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }



    public function actionNewses()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Новинки');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('newsesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('newsese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 3){
                return $this->render('newsesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('newses', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }

    public function actionNewsesu()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Новинки');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 0){
                return $this->render('newses', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('newsese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 3){
                return $this->render('newsesru', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('newses', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }

    public function actionNewsese()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Новинки');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('newsesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 0){
                return $this->render('newsesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 3){
                return $this->render('newsesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('newsese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }

    public function actionNewsesr()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Новинки');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('newsesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('newsese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 0){
                return $this->render('newses', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('newsesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }


    public function actionSales()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Акции');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('salesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('salese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 3){
                return $this->render('salesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('sales', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }

    public function actionSalesu()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Акции');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 0){
                return $this->render('sales', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('salese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 3){
                return $this->render('salesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('salesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }

    public function actionSalese()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Акции');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('salesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 0){
                return $this->render('sales', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 3){
                return $this->render('salesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('salese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }

    public function actionSalesr()
    {
        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa | '. 'Акции');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('salesu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('salese', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }
            elseif ($model['str'] == 0){
                return $this->render('sales', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            };
        };
        return $this->render('salesr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
    }
}