<?php

namespace app\controllers;

use Yii;
use app\models\CaracteristicaModelo;
use app\models\CaracteristicaModeloSearch;
use app\models\ActividadSearch;
use app\models\Modelo;
use app\models\ModeloSearch;
use app\models\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ModeloController implements the CRUD actions for Modelo model.
 */
class ModeloController extends Controller
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
     * Lists all Modelo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModeloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modelo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $searchModel = new CaracteristicaModeloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);
        $search = new ActividadSearch();
        $dataProvAc = $search->search(Yii::$app->request->queryParams,$id,'Modelo');
        $modelcm = CaracteristicaModelo::find()->where(['modelo_id_modelo'=>$id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id), 
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider, 
            'search' => $search,
            'dataProvAc' => $dataProvAc,
        ]);
    }

    /**
     * Creates a new Modelo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Modelo();
        $modelscm =[new CaracteristicaModelo];

         if ($model->load(Yii::$app->request->post())) {
            $modelscm = Model::createMultiple(CaracteristicaModelo::classname());
            Model::loadMultiple($modelscm, Yii::$app->request->post());
            $valid = $model->validate();
           // $valid = Model::validateMultiple($modelcm) && $valid;


            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelscm as $modelcm) {
                            $modelcm->modelo_id_modelo = $model->id_modelo;
                            if (! ($flag = $modelcm->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_modelo]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'modelscm'=> (empty($modelscm)) ? [new CaracteristicaModelo] : $modelscm
            ]);
        }
    }

    /**
     * Updates an existing Modelo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);        
        $modelscm =$model->caracteristicaHasModelos;

        if ($model->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($modelscm, 'id', 'id');
            $modelscm = Model::createMultiple(CaracteristicaModelo::classname(), $modelscm);
            Model::loadMultiple($modelscm, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelscm, 'id', 'id')));
            $valid = $model->validate();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save()) {
                        if (! empty($deletedIDs)) {
                            CaracteristicaModelo::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelscm as $modelcm) {
                            $modelcm->modelo_id_modelo = $model->id_modelo;
                            if (! ($flag = $modelcm->save())) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_modelo]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelscm'=> (empty($modelscm)) ? [new CaracteristicaModelo] : $modelscm
            ]);
        }
    }

    /**
     * Deletes an existing Modelo model.
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
     * Finds the Modelo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modelo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modelo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTamano() {
    if (isset($_POST['id']) ){
        $id = $_POST['id']; 
        if ($id != null) {  
            $out = Modelo::getTamano($id);
            return json_encode($out);
                }
            }
            return 'nada';
    }
}
