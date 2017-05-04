<?php

namespace app\controllers;

use Yii;
use app\models\Ensaladas;
use app\models\Foods;
use app\models\FoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FoodsController implements the CRUD actions for Foods model.
 */
class FoodsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Foods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionClasifoods()
    {
       $ensaladas = new Ensaladas();    
       $model = new Foods(); 
       $vl_foods = Foods::find()->where(['campo1' => 'VL'])->limit(5)->all();
       $cvl_foods = Foods::find()->where(['campo1' => 'CVL'])->limit(5)->all();
       $fruit_foods = Foods::find()->where(['campo3' => 'FRUIT'])->limit(5)->all();
       $plate=array();
       // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 //  var_dump($vlc_foods);die;
       // if ($ensaladas->load(Yii::$app->request->post()) && $model->save()) {
       if ($ensaladas->load(Yii::$app->request->post() )){
             foreach($ensaladas->id_food_groups as $llave=>$valor)
                        {
                          
                             //$e = new Ensaladas();      
                             //$e->id_food_groups=$valor;  
                            array_push($plate, $valor);
                             
                           }
                   // print_r($plate);
                   // die;         
            return $this->render('clasifoods', [
            'vl_foods' => $vl_foods,
            'cvl_foods' => $cvl_foods,
            'fruit_foods' =>$fruit_foods,
            'model' => $model,
            'ensaladas' =>$ensaladas,
            'plate'=>$plate,
            ]);
        } else {
            return $this->render('clasifoods', [
            'vl_foods' => $vl_foods,
            'cvl_foods' => $cvl_foods,
            'fruit_foods' =>$fruit_foods,
            'model' => $model,
            'ensaladas' =>$ensaladas,
             'plate'=>$plate,
            ]);
        }

    }
    /**
     * Displays a single Foods model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Foods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Foods();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_food_groups]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Foods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_food_groups]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Foods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Foods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Foods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Foods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

  

}
