<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 26.08.2018
 * Time: 19:26
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use app\modules\admin\models\Options;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;
use app\models\ChangeForm;
use yii\helpers\Url;

class CategoryController extends AppController
{

    public function actionIndex(){

        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model['str'] == 1){
                return $this->render('indexu', compact('hits','news', 'counth', 'countn', 'counts', 'sales', 'model'));
            } elseif ($model['str'] == 2){
                return $this->render('indexe', compact('hits','news', 'counth', 'countn', 'counts', 'sales', 'model' ));
            } elseif ($model['str'] == 3){
                return $this->render('indexr', compact('hits','news', 'counth', 'countn', 'counts', 'sales',  'model'));
            };
        };
        return $this->render('index', compact('hits','news', 'counth', 'countn', 'counts', 'sales', 'model'));

    }

    public function actionIndexu(){

        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model['str'] == 0){
                return $this->render('index', compact('hits','news', 'counth', 'countn', 'counts', 'sales', 'model'));
            }elseif ($model['str'] == 2){
                return $this->render('indexe', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model' ));
            }elseif ($model['str'] == 3){
                return $this->render('indexr', compact('hits','news', 'counth', 'countn', 'counts', 'sales', 'model'));
            };
        };
        return $this->render('indexu', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'model' ));

    }

    public function actionIndexe(){

        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model['str'] == 1){
                return $this->render('indexu', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model' ));
            }
            elseif ($model['str'] == 0){
                return $this->render('index', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model'));
            }elseif ($model['str'] == 3){
                return $this->render('indexr', compact('hits','news', 'counth', 'countn', 'counts', 'sales','model' ));
            };
        };
        return $this->render('indexe', compact('hits','news', 'sales', 'counth', 'countn', 'counts', 'model' ));

    }

    public function actionIndexr(){

        $model = new ChangeForm();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $this->setMeta('МагаZZiLLa');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model['str'] == 0){
                return $this->render('index', compact('hits','news', 'counth', 'countn', 'counts', 'sales', 'model' ));
            }
            elseif ($model['str'] == 2){
                return $this->render('indexe', compact('hits','news', 'counth', 'countn', 'counts', 'sales', 'model' ));
            }elseif ($model['str'] == 1){
                return $this->render('indexu', compact('hits','news', 'sales', 'counth', 'countn', 'counts','model' ));
            };
        };
        return $this->render('indexr', compact('hits','news', 'counth', 'countn', 'counts', 'sales', 'model' ));

    }



    public function actionView($id){

        $model = new ChangeForm();
        //  $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (empty($category)) throw new HttpException(404, 'Такой категории нет');
        $query = Product::find()->where(['category_id' => $id]);
        $hits = Product::find()->where(['hit' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
            'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('МагаZZiLLa | ' . $category->name, $category->keywords, $category->description);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('viewu', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            }
            elseif ($model['str'] == 2){
                return $this->render('viewe', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            } elseif ($model['str'] == 3){
                return $this->render('viewr', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            };
        };
        return $this->render('view', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
    }

    public function actionViewe($id) {
        $model = new ChangeForm();
        //  $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (empty($category)) throw new HttpException(404, 'Такой категории нет');
        $query = Product::find()->where(['category_id' => $id]);
        $hits = Product::find()->where(['hit' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
            'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('МагаZZiLLa | ' . $category->name, $category->keywords, $category->description);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('viewu', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            }
            elseif ($model['str'] == 0){
                return $this->render('view', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            } elseif ($model['str'] == 3){
                return $this->render('viewr', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            };
        };
        return $this->render('viewe', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
    }

    public function actionViewu($id){

        $model = new ChangeForm();
        //  $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (empty($category)) throw new HttpException(404, 'Такой категории нет');
        $query = Product::find()->where(['category_id' => $id]);
        $hits = Product::find()->where(['hit' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
            'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('МагаZZiLLa | ' . $category->name, $category->keywords, $category->description);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 0){
                return $this->render('view', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            }
            elseif ($model['str'] == 2){
                return $this->render('viewe', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            } elseif ($model['str'] == 3){
                return $this->render('viewr', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            };
        };
        return $this->render('viewu', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
    }
    public function actionViewr($id) {
        $model = new ChangeForm();
        //  $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if (empty($category)) throw new HttpException(404, 'Такой категории нет');
        $query = Product::find()->where(['category_id' => $id]);
        $hits = Product::find()->where(['hit' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3,
            'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('МагаZZiLLa | ' . $category->name, $category->keywords, $category->description);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model['str'] == 1){
                return $this->render('viewu', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            }
            elseif ($model['str'] == 0){
                return $this->render('view', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            } elseif ($model['str'] == 2){
                return $this->render('viewe', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
            };
        };
        return $this->render('viewr', compact('model', 'hits', 'news', 'sales', 'counth', 'countn', 'counts', 'category', 'pages','products'));
    }




    public function actionSearch() {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('МагаZZiLLa | Поиск: ' . $q);
        if (!$q)
            return $this->render('search');
        $model = new ChangeForm();
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        $sales = Product::find()->where(['sale' => '1'])->all();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model['str'] == 1){
                return $this->render('searchu', compact('products', 'pages', 'counth', 'countn', 'counts', 'hits', 'news', 'sales', 'q', 'model'));
            } elseif ($model['str'] == 2){
                return $this->render('searche', compact('products', 'pages',  'counth', 'countn', 'counts','hits', 'news', 'sales', 'q', 'model'));
            } elseif ($model['str'] == 3){
                return $this->render('searchr', compact('products', 'pages',  'counth', 'countn', 'counts','hits', 'news', 'sales', 'q', 'model'));
            };
        };
        return $this->render('search', compact('products', 'pages', 'hits', 'counth', 'countn', 'counts', 'news', 'sales', 'q', 'model'));

    }

    public function actionSearchu() {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('МагаZZiLLa | Поиск: ' . $q);
        if (!$q)
            return $this->render('search');
        $model = new ChangeForm();
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model['str'] == 0){
                return $this->render('search', compact('products',  'counth', 'countn', 'counts','pages', 'hits', 'news', 'sales', 'q', 'model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('searche', compact('products', 'counth', 'countn', 'counts', 'pages', 'hits', 'news', 'sales', 'q', 'model'));
            } elseif ($model['str'] == 3){
                return $this->render('searchr', compact('products', 'pages',  'counth', 'countn', 'counts','hits', 'news', 'sales', 'q', 'model'));
            };
        };
        return $this->render('searchu', compact('products',  'counth', 'countn', 'counts','pages', 'hits', 'news', 'sales', 'q', 'model'));

    }

    public function actionSearche() {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('МагаZZiLLa | Поиск: ' . $q);
        if (!$q)
            return $this->render('search');
        $model = new ChangeForm();
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model['str'] == 1){
                return $this->render('searchu', compact('products',  'counth', 'countn', 'counts','pages', 'hits', 'news', 'sales', 'q', 'model'));
            } elseif ($model['str'] == 0){
                return $this->render('search', compact('products',  'counth', 'countn', 'counts','pages', 'hits', 'news', 'sales', 'q', 'model'));
            } elseif ($model['str'] == 3){
                return $this->render('searchr', compact('products', 'pages',  'counth', 'countn', 'counts','hits', 'news', 'sales', 'q', 'model'));
            };
        };
        return $this->render('searche', compact('products', 'pages',  'counth', 'countn', 'counts','hits', 'news', 'sales', 'q', 'model'));

    }

    public function actionSearchr() {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('МагаZZiLLa | Поиск: ' . $q);
        if (!$q)
            return $this->render('search');
        $model = new ChangeForm();
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $hits = Product::find()->where(['hit' => '1'])->all();
        $news = Product::find()->where(['new' => '1'])->all();
        $sales = Product::find()->where(['sale' => '1'])->all();
        $counth = Product::find()->where(['hit' => '1'])->count();
        $countn = Product::find()->where(['new' => '1'])->count();
        $counts = Product::find()->where(['sale' => '1'])->count();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model['str'] == 0){
                return $this->render('search', compact('products',  'counth', 'countn', 'counts','pages', 'hits', 'news', 'sales', 'q', 'model'));
            }
            elseif ($model['str'] == 2){
                return $this->render('searche', compact('products', 'counth', 'countn', 'counts', 'pages', 'hits', 'news', 'sales', 'q', 'model'));
            } elseif ($model['str'] == 1){
                return $this->render('searchu', compact('products', 'pages',  'counth', 'countn', 'counts','hits', 'news', 'sales', 'q', 'model'));
            };
        };
        return $this->render('searchr', compact('products',  'counth', 'countn', 'counts','pages', 'hits', 'news', 'sales', 'q', 'model'));

    }

}
