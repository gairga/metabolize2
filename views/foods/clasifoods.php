<?php
use kartik\checkbox\CheckboxX;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\ActiveForm;
$form = ActiveForm::begin();
/* @var $this yii\web\View */
/* @var $searchModel app\models\FoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foods';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
  .check
{
    opacity:0.5;
  color:#996;
  
}

</style>

<?php $this->registerJs("
    jQuery(function($){
    

 $(document).ready(function(e){
        $('.img-check').click(function(){
        $(this).toggleClass('check');
      });
  });

    });");


?>
<?php
if( sizeof($plate) != 0 ){ 
  var_dump($plate);
  echo '
        <div style="position:relative">
             <img src="imagenes/plate.png" space="16" height="268" vspace="16" />
        ';

  foreach ($plate as $key){
    // var_dump($key);
     echo '

        <div style="position:absolute; top:150px; left:150px; width:200px; height:200px;">
               <a href="#">
                  <img border="1" src="imagenes/'.$key.'.jpg" width="100" height="100" />
               </a>
           </div>
        </div>';
   }
   var_dump($plate);
}else{


?>
<div class="row">
  <div class="form-group"> 
<?php $form = ActiveForm::begin(); ?>

   <?php  //$list = [0 => 'PHP', 1 => 'MySQL', 2 => 'Javascript'];?>

   <?php //$form->field($ensaladas, 'id_food_groups')->checkboxlist($list); ?>
  <p>CVLeafy</p>
   
   <?php



   $pila= array();
   foreach ($vl_foods as $key){
      //array_push($pila, $key['id_alimento']);
      //var_dump($pila); 




                  echo '<div class="col-md-3">
                      <label class="btn btn-default">
                         <img src="imagenes/'.$key['name'].'.jpg"  width="60" height="60" class="img-rounded img-check">
                         <input type="checkbox" name="Ensaladas[id_food_groups][]" id="item4" value="'.$key['name'].'" class="hidden" autocomplete="off">
                      </label>
                  </div><br/>   ';
     
//die;
  }
    ?>
   <br/>
    <p>VLeafy</p> 

    <?php
    foreach ($cvl_foods as $key1){
       //  var_dump($key1["name"]);die;
                  echo '
                   <div class="col-md-3">
                      <label class="btn btn-default">
                         <img src="imagenes/'.$key1["name"].'.jpg" width="60" height="60" class="img-rounded img-check">
                         <input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off">
                      </label>
                  </div><br/>  
                ';
                            
                                                
       
    }
   ?>
   <br/>

    <p>FRUIT</p>
    <?php
    foreach ($fruit_foods as $key2){
       //  var_dump($key1["name"]);die;
                  echo '
                  <div class="col-md-3">
                      <label class="btn btn-default">
                         <img src="imagenes/'.$key2["name"].'.jpg" width="60" height="60" class="img-rounded img-check">
                         <input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off">
                      </label>
                  </div><br/>     
                ';
                            
                                                
       
    }
   ?>
   



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Armar Ensalada' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

      </div>  
</div>

<?php
}
?>