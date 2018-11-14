<?php

namespace app\modules\admin\controllers;


use app\modules\admin\models\Options;
use yii\web\Controller;
use Yii;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



class OptionsController extends Controller
{

    /**
     * Lists all Options models.
     * @return mixed
     */
    public function actionIndex()
    {
       // $course_current = 67;
       $course_current = get_course();
       $course_curr = round($course_current, 2);
        //debug(Yii::$app->CbRF->one());



        $dataProvider = new ActiveDataProvider([
            'query' => Options::find(),
        ]);

        return $this->render('index',[
            'dataProvider' => $dataProvider, 'course_curr' => $course_curr, 'course_current' => $course_current,
        ]);
    }

    /**
     * Displays a single Options model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new Options();
        $pat = Options::findOne($id);
        $course_current = get_course($pat['title']);
        /*if ($pat['title'] === 'RUR'){
            $course_current = round(1 / $course_current,2);
        };*/
        $course_curr = round($course_current, 2);
        if( $course_curr && round($course_current, 2) != $pat['api'] ){
            $pat->api = "$course_curr";
            $pat->save();
         }

        return $this->render('view', [
            'model' => $this->findModel($id), 'course_curr' => $course_curr, 'course_current' => $course_current,
        ]);
    }

    /**
     * Creates a new Options model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Options();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Валюта \"{$model->name}\" добавлена");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Options model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $model = new Options();
        $pat = Options::findOne($id);
        $course_current = get_course($pat['title']);
        /*if ($pat['title'] === 'RUR'){
            $course_current = round(1 / $course_current,2);
        };*/
        $course_curr = round($course_current,2);
        if( $course_curr && round($course_current, 2) != $pat['api'] ){
            $pat->api = "$course_curr";
            $pat->save();
        }


        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "{$model->name} - {$model->api}  сохранён!");
            return $this->redirect(['index', 'id' => $model->id]);
        };

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Options model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "Валюта удалена!");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Options the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Options::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
