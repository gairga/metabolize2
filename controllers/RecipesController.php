<?php

namespace app\controllers;

use Yii;
use app\models\Recipes;
use app\models\Foods;
use app\models\Dri;
use app\models\RecipesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * RecipesController implements the CRUD actions for Recipes model.
 */
class RecipesController extends Controller
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
     * Lists all Recipes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecipesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipes model.
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
     * RecipeAnalysis 
     * RecipeAnalysis.recipeanalysis
     */
    public function actionRecipeanalysis()
    {
        $model = new Recipes();
        $recipes="";

        $curl = curl_init();
        $dris = Dri::find()->all();
       // $foods = Foods::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
       // if ($model->load(Yii::$app->request->post() )){
                //Variables del Modelo

        
                $title= $model->title; 
                $prep=  $model->prep;
                $yield= $model->yield;
                $ingr2 = $model->ingr;
                $option_select = $model->id_usuario_registrados;
                //Arreglo la cadena
            
                $ingr2 = explode("\n", str_replace("\r", "", $ingr2));          
                $ingr2 = implode("\", \"", $ingr2);
                $ingr =' "' . $ingr2 . '" ';
  
                //Curl
                $json = ' {
                    "title": "' . $title . '",
                    "prep": "' . $prep . '",
                    "yield": "' . $yield . '",
                    "ingr": ['. $ingr .']
                }';
  
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.edamam.com/api/nutrition-details?app_id=8366dec0&app_key=9a33361ea50f81a2780a36c97a7f9408",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $json,
                    CURLOPT_HTTPHEADER => array(
                      "cache-control: no-cache",
                      "content-type: application/json",
                      "postman-token: dff6a0e3-7127-7505-c547-4eb3f9304846"
                ),
                ));
  
              $response = curl_exec($curl);
              $err = curl_error($curl);

              curl_close($curl);
  
                  if ($err) {
                    echo "Formato Incorrecto #:" . $err;

                  }else{
                        $recipes = json_decode($response, true);                    
                        $file = $model->id_recipes;
                        $file .= ".json";
 


                        file_put_contents("data/recetas/$file",json_encode($recipes));
                        $ingr=$model->ingr;
                        return $this->render('recipeanalysis', [
                              'model' => $model,
                              'recipes' => $recipes, 
                              'dris' => $dris,
                              'option_select' => $option_select,
                        ]);
                  }

        } else {
            return $this->render('recipeanalysis', [
                'model' => $model,
                'recipes'=> $recipes,
                'dris' => $dris 
             //   'foods'=>$foods
            ]);
        }
       
      
    }

    public function actionGeneraruser($id){

   //  var_dump("ENTRE");die;
        //$model = new Recipes();   
        $recipes="";
        $model = $this->findModel($id);
        $id_foods = Recipes::findOne($id);
        $buscar="";
        $archivotitle = "data/recetas/$id_foods->title.json";
        $archivoid = "data/recetas/$id_foods->id_recipes.json";
        if (file_exists($archivotitle)){
          //var_dump($archivotitle);die;
                $response = file_get_contents("data/recetas/$id_foods->title.json");  
                $recipes = json_decode($response, true); 
        }else{
                $response = file_get_contents("data/recetas/$id_foods->id_recipes.json");  
                $recipes = json_decode($response, true); 
        }

        $curl = curl_init();
        $dris = Dri::find()->all();
       
            return $this->render('generaruser', [
                'model' => $model,
                'recipes'=> $recipes,
                'dris' => $dris 
             //   'foods'=>$foods
            ]);
        
       
      
    }
    public function actionGenerar($id)
    {
     
        //$model = new Recipes();
        $recipes="";
        $model = $this->findModel($id);
        $id_foods = Recipes::findOne($id);
        $buscar="";
        $archivotitle = "data/recetas/$id_foods->title.json";
        $archivoid = "data/recetas/$id_foods->id_recipes.json";
        
        if (file_exists($archivotitle)) {
                  //var_dump($archivotitle);die;
                $response = file_get_contents("data/recetas/$id_foods->title.json");  
                $recipes = json_decode($response, true); 
        }else{
                $response = file_get_contents("data/recetas/$id_foods->id_recipes.json");  
                $recipes = json_decode($response, true); 
        }

        $curl = curl_init();
        $dris = Dri::find()->all();
       
            return $this->render('generar', [
                'model' => $model,
                'recipes'=> $recipes,
                'dris' => $dris 
             //   'foods'=>$foods
            ]);
        
       
      
    }
    public function actionDetailanalysis()
    {
        $model = new Recipes();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }
  return $this->renderPartial('_analysis', [
       //_ return $this->render('detailanalysis', [
            'model' => $model,
        ]);
    }
    /**
     * C_reates a new Recipesaaaaa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Recipes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_recipes]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Recipes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_recipes]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Recipes model.
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
     * Finds the Recipes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recipes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
