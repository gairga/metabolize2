<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\popover\PopoverX;
use scotthuangzl\googlechart\GoogleChart;
use hscstudio\chart\ChartNew;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\Highstock;
use miloschuman\highcharts\SeriesDataHelper;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use app\models\Usuarior;
use app\models\Foods;
/* @var $this yii\web\View */
/* @var $model app\models\Recipes */
/* @var $form ActiveForm */
$form = ActiveForm::begin([
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-md-10\">{input}</div>\n<div class=\"col-md-offset-2 col-md-10\">{error}</div>",
    ],
]);
//Para los Usuarios
$usuarior="";
$name="";
//Variable
$valordri="";$calculografico=""; $sugar="";
$fat_p=""; $protein="";$carbohydrt_p="";$saturated="";
$array_dri=array();
$array_label=array();
$array_tabledri=array();
             


$identity = Yii::$app->getUser()->getIdentity();
    if (isset($identity->profile)) {
          //$id=$identity->apellido;        
          $id = substr($identity->id, 9);             
         //Busco en mi BD el codigo extraido
             $usuarior = Usuarior::find()
                ->where(['apellido' => $id])
                ->one();   
             $name=$usuarior->id_usuario;   
    }elseif(isset(Yii::$app->user->identity->username)){
        $name="Admin";
        $id = "";

    }else{
        $name="User";
        $id = "";
    }

    //var_dump($name);die;
?>

<?php $this->registerJs("
    jQuery(function($){
    

    var vacio ='';
  //  $('#recipes-ingr').val(vacio).html();
    $('#recipes-id_usuario_registrados').change(function(){
     
                if ($(this).val() == 1){                   
                }
                if ($(this).val() == 2){                 
                }
                if ($(this).val() == 3){        
                }

    });

    });");


?>



<div class="recipes-recipeanalysis">

<?php $this->title = 'Recipe Analysis '; ?>     


        <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title',
       ['labelOptions'=>['class'=>'control-label col-md-2']]
     )->textInput(['style'=>'width:300px']); ?>
    <?= $form->field($model, 'name',   ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['style'=>'width:300px']) ?>
    <?= $form->field($model, 'prep',    ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['style'=>'width:300px']) ?>

    <?= $form->field($model, 'yield',    ['labelOptions'=>['class'=>'control-label col-md-2']])->textInput(['style'=>'width:50px']) ?>
    <?= $form->field($model, 'ingr',    ['labelOptions'=>['class'=>'control-label col-md-2']])->textArea(['rows' => '8','style'=>'width:500px']) ?>
   
        <div class="form-group">
            <?= Html::submitButton('Generate Graphic', ['class' => 'btn btn-info']) ?>
        </div>
    

    <?php

    if($recipes!=""){
                 
    ?>

    <button class="btn btn-primary" type="button">
               Total Yield <span class="badge"><?php echo (integer)$recipes["yield"];?></span>
    </button>

    <button class="btn btn-primary" type="button">
               Total Calories <span class="badge"><?php echo (integer)$recipes["calories"];?></span>
    </button>

    <button class="btn btn-primary" type="button">
                Total Weight <span class="badge"><?php echo (integer)$recipes["totalWeight"];?></span>
    </button>

    <button class="btn btn-primary" type="button">
               Calories/svg <span class="badge"><?php echo (integer)$recipes["calories"]/(integer)$recipes["yield"];?></span>
    </button>
  <br/>
    <p><span class="badge badge-info">Nutrition Facts: </span></p>
    <br/>


<div class="progress">

  <!-- Items -->
  <div class="progress-bar progress-bar-danger" style="width: 10%">
     <span class="badge badge-warning">Items</span>
     <span class="sr-only">10% Complete (danger)</span>
  </div>

   <!-- U/swgs -->

  <div class="progress-bar progress-bar-success" style="width: 35%">
    <span class="badge badge-warning">U/svg</span>
        <?php echo (integer)$valorunitario=$recipes["calories"]/$recipes["yield"]; ?>
    <span class="sr-only">80% Complete (success)</span>
  </div>

 <!-- % DRI -->

  <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%">
      <span class="badge badge-warning">% DRI</span>
    <?php echo (integer)$valorunitario/2000*100;?>

    <span class="sr-only">35% Complete (success)</span>
  </div>

</div>
<?php
      
               foreach (array($recipes) as $recetas => $detalle){      
                            $i=$detalle["totalNutrients"];
                            $yield=$recipes["yield"];
                            foreach($i as $datos3 => $key3)
                                    {
                                    //Variables
                                    $valordri="";
                                    $nutrientdri="";
                                    $porcentajedri="";
                                    $protein_circulo="";
                                    $valor_por_porcion=$key3["quantity"]/$yield;
                                    $dri=($valor_por_porcion/2000)*100;

           //PAra el grafico 

                                                if($key3["label"]=="Fat"){                       
                                                   $fat_p=(integer)$valor_por_porcion;       
                                                }
                                                if($key3["label"]=="Protein"){
                                                    $protein=(integer)$valor_por_porcion;
                                                }
                                                if($key3["label"]=="Carbs"){
                                                    $carbohydrt_p=(integer)$valor_por_porcion;
                                                }
                                                if($key3["label"]=="Saturated"){
                                                    $saturated=(integer)$valor_por_porcion;
                                                }
                                                if($key3["label"]=="Sugars"){
                                                    $sugar =(integer)$valor_por_porcion; 
                                                }
                                                if($key3["label"]=="Protein"){
                                                    $protein_circulo=(integer)$valor_por_porcion;   
                                                }
//

                                    foreach ($dris as $j){
                                        
                                         if($j->nutrient == $key3["label"]){

                                              $valordri=$j->value;
                                              $nutrientdri=$j->nutrient;
                                              $porcentajedri=($valor_por_porcion/$valordri)*100;
                                              $calculografico=($valordri/$valor_por_porcion)*100;
                                          //    if(($key3["label"] == "Calcium") or ($key3["label"] == "Iron") or ($key3["label"] == "Magnesium")){
                                                array_push($array_dri, (integer)$valor_por_porcion);
                                                array_push($array_label, $key3["label"]);
                                                array_push($array_tabledri, (integer)$valordri);
                                            //  }  
                                           
                                          }  
                                    }
                                  
                                  
                                    
                                    $valor_por_porcion=$key3["quantity"]/$yield;
                                    $dri=($valor_por_porcion/2000)*100;

                                      }

              }
?>
<div>

<?php
$toalpse=""; $totalf="";
//var_dump($fat_p);die;
$totalf=$fat_p-$saturated;
/**
Formula 1
Unsat Fat = 14 => 14/46 = 30.4
Protein = 6 => 6/46 = 13
Carbo = 19 => 19/46 = 41.3
Sugar = 6 => 6/46 = 13
Sat Fat = 1 => 1/46 =2.17

Porcentaje=100%
Todos los gramos(14+6+19+6+1)=46

Formula 2
Unsat Fat = 14*9 => 126/259 = 49
Protein = 6*9 => 24/259 = 9
Carbo = 19*4 => 76/259 = 29
Sugar = 6*4 => 24/259 = 9
Sat Fat = 1*9 => 9/259 =3

Porcentaje=100%
Todos los gramos(14+6+19+6+1)=46
**/
echo Highcharts::widget([
    'options' => [
        'chart' => ['width' => 500, 'height' => 250],
        'title' => ['text' => "Pachi's -". $model->title."" ],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],

        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'Value',
                'data' => [
                    ['Fat P', $totalf], //Fat(104) - Saturated (35) / Sugar (15) * 100
                    ['Protein', $protein], //(98/229)*100
                    ['Carbohydrt P', $carbohydrt_p-$sugar], //Total Carbohydrt = Carbohydrt (27)- Sugar(15)
                    ['Sugar_Tot', $sugar],
                    ['Sat Fat', $saturated]
                    //Total Fat Total (104)+Carb(27)+Pro (98)
                ],  
            ] // new closing bracket
        ],
    ],
]);



echo Highcharts::widget([
    'options' => [
        'chart' => ['width' => 500, 'height' => 250],
        'title' => ['text' => "Pachi's 2-". $model->title."" ],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],

        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'Value',
                'data' => [
                    ['Fat P', 22], //Fat(104) - Saturated (35) / Sugar (15) * 100
                    ['Protein', 25], //(98/229)*100
                    ['Carbohydrt P', 40], //Total Carbohydrt = Carbohydrt (27)- Sugar(15)
                    ['Sugar_Tot', 10],
                    ['Sat Fat', 3]
                    //Total Fat Total (104)+Carb(27)+Pro (98)
                ],  
            ] // new closing bracket
        ],
    ],
]);

?>
</div>

<div>

<!--

1 Taza = 16 cucharadas (tablespoons)
1 Taza = 3 
1 Taza 48 Cucharaditas (teaspoons)
-->
    <!--  EMPIEZO AQUI LAS RECETAS -->
  
           <?php
            //VARIABLES
            $var_ing=""; $vegetales=0;$fruit=0;$prot=0;$prcarb=0;$pp=0;$fat=0;
            $sub_vegetales=0;$sub_fruit=0;$sub_prot=0;$sub_prcarb=0;$sub_pp=0;$sub_fat=0;
            $sub_fruit=0;
            $valuecup="";$vvolumenxunidad="";$cadena=""; $unidad="";$es="";
            $cup = ""; $large =""; $oztres=""; $eggs = ""; $oz = "";
            $tablespoon = ""; $tsp = ""; $food_match="";    $food_v="";$food_v1="";
            $foods ="";$es="";
            //Variable Grafico 3 
            $spherbxg3=0;$prcarbg3=0;$g3v=0;$legumes=0;$cvg3=0;$highcarbg3=0;$vegetalesg3=0;
            $eggg3=0;$poultryg3=0;$soyg3=0; $beefg3=0; $seafood=0;$vealg3=0;$lampg3=0;$gameg3=0; 
            $pookg3=0;$proteinasg3=0;$fruitrawg3=0; $fruitg3=0;$fruittg3=0;
            $dairyg3=0;$olidsg3=0;$spg3=0; $nutsg3=0; $fattg3=0;
            foreach ($recipes["ingredients"] as $key=>$data){
                //Ingredinte
                $var_ing=$data["text"];
        
                foreach ($data["parsed"] as $k => $v){
                                $food_v=str_replace(",","-",trim($v["food"]));
                                $food_v=trim($food_v);
                                $food_v=str_replace('- ', '-',$food_v);
                                $food_v1=str_replace(",","-",trim($v["foodMatch"]));
                                $food_v1=trim($food_v1);
                                $food_v1=str_replace('- ', '-',$food_v1);

                     /*   $foods = Foods::findOne([
                            'name' => strtoupper($food_v),
                        ]);*/

                        //Extraigo el Codigo de la variable foodid FOOD_XXXX
                 /*          $cadena = substr($v["foodId"], 5);
                        $subcadena = "_"; 
                        // localicamos en que posición se haya la $subcadena, en nuestro caso la posicion es "7"
                        $posicionsubcadena = strpos($cadena, $subcadena); 
// eliminamos los caracteres desde $subcadena hacia la izq, y le sumamos 1 para borrar tambien el @ en este caso
                        $id = substr($cadena, ($posicionsubcadena+1)); 
                        //var_dump($id);die;
                        //_1
                     //   var_dump($id);                        
                        //Busco en mi BD el codigo extraido
                        $foods = Foods::findOne($id); 
                     //   var_dump($id);                        
                        //Busco en mi BD el codigo extraido
                        $foods = Foods::findOne($id); */
                             $cadena = substr($v["foodId"], 5);
                        $subcadena = "_"; 
                        // localicamos en que posición se haya la $subcadena, en nuestro caso la posicion es "7"
                        $posicionsubcadena = strpos($cadena, $subcadena); 
                        if($posicionsubcadena 
                          ===false){
 $id = substr($cadena, ($posicionsubcadena+1)); 
                        }else{
                          $id = substr ($cadena, 0, strlen($cadena) - 2);
                        }
$foods = Foods::find()->where(['id_food_groups'=>$id])->one();
                        //Si el codigo es el mismo que en mi BD muestro los resultados detallados
                      //  if($foods!= ""){
                       //Si el codigo es el mismo que en mi BD muestro los resultados detallados
                        if($foods["id_food_groups"] == (integer)$id){         
                         
                                //Buusco la unidad "cup" para ver si existe coincidencia
                                $cup = strpos($foods["gmwt_desc1"], "cup");
                                $large = strpos($foods["gmwt_desc1"], "leaves");                       
                                $eggs = strpos($foods["gmwt_desc1"], "eggs");
                              //  $tbsp = strpos($foods["gmwt_desc1"], "tbsp");
                                $tablespoon = strpos($foods["gmwt_desc1"], "tablespoon");
                                $tsp = strpos($foods["gmwt_desc1"], "tsp");
                               
                                //CUP 0.5 es 0.5 1
                                    if ($cup==true){
                                            $cadena = substr($foods["gmwt_desc1"],0, 3);
                                            $unidad=eregi_replace("[a-z,&%$#@\"!?¿=/\*\+,ñ]","",$cadena); 
                                            if($foods["gmwt_desc1"]==".5 cup- diced"){
                                                 $vvolumenxunidad=$foods["GmWt_1"]*0.5; 
                                                 $vvolumenxunidad=(2/$vvolumenxunidad);
                                                 $es="CUP x 0.5"; 
                                            }else{
                                                 $vvolumenxunidad=(integer)$v["weight"]/$foods["GmWt_1"]; 
                                                 $es="CUP"; 
                                            }
                                          
                                    }elseif(($foods["gmwt_desc1"]=="1 oz") or  ($foods["gmwt_desc1"]=="1 serving")){
                                            $vvolumenxunidad=$foods["GmWt_1"]/8;
                                            $es="OZ es x 8";
                                    }elseif($tablespoon==true){
                                            $es="tablespoon es por 16";
                                            $vvolumenxunidad=$foods["GmWt_1"]/16; 
                                    }elseif($tsp==true){
                                            $es="tsp es por 48";
                                            $cadena = substr($foods["gmwt_desc1"],0, 3);
                                            $unidad=eregi_replace("[a-z,&%$#@\"!?¿=/\*\+,ñ]","",$cadena);
                                            $vvolumenxunidad=$foods["GmWt_1"]/48; 
                                    }elseif($large==true){
                                            $es="leaves es por 60";
                                            $vvolumenxunidad=$foods["GmWt_1"]/50;
                                    }elseif($foods["gmwt_desc1"]=="3 oz"){
                                            $es="3 Oz es por 60";
                                            $vvolumenxunidad=$foods["GmWt_1"]/3;
                                    }elseif ($foods["gmwt_desc1"]=="5.3 oz") {
                                            $es="3 Oz es por 60";
                                            $vvolumenxunidad=(($foods["GmWt_1"]/8)*5.3);
                                    }else{
                                            $es="eggs es por 4";
                                            $vvolumenxunidad=$foods["GmWt_1"]*4;
                                    }

                                    if($foods["id_clasificacion"]=="V"){
                                                  $vegetalesg3+=(integer)$v["weight"]; 
                                                  $vegetales+=number_format((integer)$v["weight"]/$vvolumenxunidad, 2, '.', '');
                                    }elseif($foods["id_clasificacion"]=="FRUIT"){
                                                  $fruittg3+=(integer)$v["weight"]; 
                                                  if ($vvolumenxunidad==0) {
                                                      $fruit+=number_format($vvolumenxunidad/$v["weight"], 2, '.', '');
                                                   }else{
                                                     $fruit+=number_format($vvolumenxunidad/$v["weight"], 2, '.', '');
                                                   } 
                                                  
                                    }elseif($foods["id_clasificacion"]=="P"){
                                                  $proteinasg3+=(integer)$v["weight"];
                                                  $prot+=number_format((integer)$v["weight"]/$vvolumenxunidad);
                                    }elseif($foods["id_clasificacion"]=="FAT"){
                                                  $fattg3+=(integer)$v["weight"];
                                                  $fat+=(($v["weight"]/$vvolumenxunidad))*48;
                                    }elseif($foods["id_clasificacion"]=="p"){
                                                  $pp+=number_format((integer)$v["weight"]/$vvolumenxunidad, 2, '.', '');
                                    }else{
                                                  $prcarb+=number_format((integer)$v["weight"]/$vvolumenxunidad, 2, '.', '');
                                    }
                                

                                    //SubCategorias
                                    if($foods["campo3"]=="CV" or $foods["campo3"]=="V"){
                                                  $sub_vegetales+=$vvolumenxunidad;
                                    }elseif($foods["campo3"]=="LEGUMES"){
                                                  $sub_fruit+=$vvolumenxunidad;

                                    }elseif($foods["campo1"]=="OTHER"){
                                                  $sub_prot+=$vvolumenxunidad;
                                    }elseif($foods["campo3"]=="PR CARB"){
                                                  $sub_fat+=$vvolumenxunidad;
                                    }elseif ($foods["campo1"]=="FRUIT") {
                                                   $sub_fat+=$vvolumenxunidad;
                                    }
                                
                                   if ($vvolumenxunidad==0){
                                                    number_format($vvolumenxunidad/$v["weight"], 2, '.', '');
                                                   }else{
                                                    number_format($vvolumenxunidad/$v["weight"], 2, '.', '');
                                    }
                                    //PARA EL GRAFICO 3 VEGETALES 
                                                  switch($foods["campo3"]){
                                                        //VEGETALES
                                                        case "SP+HERB+X":
                                                        $spherbxg3+=$v["weight"];
                                                        break;
                                                        case "PR CARB":
                                                        $prcarbg3+=$v["weight"];
                                                        break;
                                                        case "V":
                                                        $g3v+=$v["weight"];
                                                        break;
                                                        case "LEGUMES":
                                                        $legumes+=$v["weight"];
                                                        break;
                                                        case "CV":
                                                        $cvg3+=$v["weight"];
                                                        break;
                                                        case "RT":
                                                        $highcarbg3+=$v["weight"];
                                                        break;
                                                        default:                      
                                                }
                                                switch($foods["campo3"]){
                                                        //PROTEINAS               
                                                        case "EGG+EGG P":
                                                        $eggg3+=$v["weight"];
                                                        break;
                                                        case "Poultry":
                                                        $poultryg3+=$v["weight"];
                                                        break;
                                                        case "SOY":
                                                        $soyg3+=$v["weight"];
                                                        break;
                                                        case "SEAFOOD":
                                                        $seafood+=$v["weight"];
                                                        break;
                                                        case "VEAL":
                                                        $vealg3+=$v["weight"];
                                                        break;
                                                        case "LAMB":
                                                        $lampg3+=$v["weight"];
                                                        break;
                                                        case "GAME":
                                                        $gameg3+=$v["weight"];
                                                        break;
                                                        case "BEEF":
                                                        $beefg3+=$v["weight"];
                                                        break;
                                                        case "PORK":
                                                        $pookg3+=$v["weight"];
                                                        break;
                                                        default:                      
                                                }

                                                switch($foods["campo3"]){
                                                        //FRUIT   
                                                        case "FRUIT":
                                                        $fruitg3+=$v["weight"];
                                                        break;
                                                        case "FRUIT RAW":
                                                        $fruitrawg3+=$v["weight"];
                                                        break;
                                                        default:                      
                                                }
                                                //FAT                                    
                                                switch($foods["campo3"]){
                                                        //FAT               
                                                        case "DAIRY":
                                                        $dairyg3+=$v["weight"];
                                                        break;
                                                        case "Oil+Dssing":
                                                        $olidsg3+=$v["weight"];
                                                        break;
                                                        case "Sp+Sc+Dssg":
                                                        $spg3+=$v["weight"];
                                                        break;
                                                        case "NUTS + SEEDS":
                                                        $nutsg3+=$v["weight"];
                                                        break;
                                                        default:                      
                                                }                              
                        }
                        
                    
                    }



            }           
?>

</div>
<div>
<?php
$totalgrafico2=0;
$totalgrafico2=$vegetales+$fruit+$prot+$prcarb+($fat/48);
echo Highcharts::widget([
      'scripts' => [
          'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
          'modules/exporting', // adds Exporting button/menu to chart
     //  'themes/grid-light'        // applies global 'grid' theme to all charts
          'themes/grid-light'
    ],
    'options' => [
        'chart' => ['width' => 500, 
                    'height' => 250,
                    'zoomType' => 'x'],
        'title' => ['text' => "Pachi's - My Recipe in Cup ". number_format($totalgrafico2, 2, '.', '')."" ],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],

        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'Value',
                'data' => [
                    ['VEGETABLES + CARB', $vegetales], //Fat(104) - Saturated (35)
                    ['FRUIT', $fruit],
                    ['PROT', $prot], //Total Carbohydrt = Carbohydrt (27)- Sugar(15)
                    ['FAT IN TSP', $fat],
                    ['OTHERS', $prcarb],
                   // ['PROTEIN', $prcarb]
                    //Total Fat Total (104)+Carb(27)+Pro (98)
                ],
            ] // new closing bracket
        ],
    ],
]);

?>
</div>
<div>

<?php
echo Highcharts::widget([
    'options' => [
        'chart' => ['width' => 500, 'height' => 250],
        'title' => ['text' => "Pachi's - CARB VOLUME"],
        'plotOptions' => [
            'pie' => [
                'cursor' => 'pointer',
            ],
        ],

        'series' => [
            [ // new opening bracket
                'type' => 'pie',
                'name' => 'Value',
                'data' => [
                    ['VC', $sub_vegetales], //Fat(104) - Saturated (35)
                    ['LEGUMES', $sub_fruit],
                    ['PROC CARB', $sub_fat],
                    ['FRUIT', $sub_fruit],
                    ['OTHER', $sub_prot]
        

                    //Total Fat Total (104)+Carb(27)+Pro (98)
                ],
            ] // new closing bracket
        ],
    ],
]);

?>


<div id="container" style="width: 800px; height: 400px;"></div>

<?php $this->registerJs("
    jQuery(function($){
    

$(function () {

    var colors = Highcharts.getOptions().colors,
        categories = ['PROTEINAS', 'FAT', 'Vegetales', 'FRUT'],
        data = [{
            y: $proteinasg3,
            color: colors[0],
            drilldown: {
                name: 'PROTEINAS TIPOS',
                categories: ['EGG+EGG P','Poultry','SOY','SEAFOOD','VEAL','LAMB','GAME','BEEF','PORK'],
                data: [$eggg3, $poultryg3,$soyg3,$seafood,$vealg3,$lampg3,$gameg3,$beefg3,$pookg3],
                color: colors[0]
            }
        }, {
            y: $fattg3,
            color: colors[1],
            drilldown: {
                name: 'FAT TIPOS',
                categories: ['DAIRY', 'Oil+Dssing', 'Sp+Sc+Dssg', 'NUTS + SEEDS', 'PR MEATS'],
                data: [$dairyg3, $olidsg3, $spg3, $nutsg3, 0],
                color: colors[1]
            }
        }, {
            y: $vegetalesg3,
            color: colors[2],
            drilldown: {
                name: 'Tipos de Vegetales',
                categories: ['SP+HERB+X', 'PR CARB', 'V', 'LEGUMES - (EnergyV)', 'CV',
                    'HIGH CARB V'],
                data: [$spherbxg3, $prcarbg3, $g3v, $legumes, $cvg3, $spherbxg3],
                color: colors[2]
            }
        }, {
            y: $fruittg3, 
            color: colors[3],
            drilldown: {
                name: 'FRUT TIPOS',
                categories: ['FRUIT', 'FRUIT RAW'],
                data: [$fruitg3, $fruitrawg3],
                color: colors[3]
            }
        },{
            y: 0.2,
            color: colors[4],
            drilldown: {
                name: 'Proprietary or Undetectable',
                categories: [],
                data: [],
                color: colors[4]
            }
        }],
        browserData = [],
        versionsData = [],
        i,
        j,
        dataLen = data.length,
        drillDataLen,
        brightness;


    // Build the data arrays
    for (i = 0; i < dataLen; i += 1) {

        // add browser data
        browserData.push({
            name: categories[i],
            y: data[i].y,
            color: data[i].color
        });

        // add version data
        drillDataLen = data[i].drilldown.data.length;
        for (j = 0; j < drillDataLen; j += 1) {
            brightness = 0.2 - (j / drillDataLen) / 4;
            versionsData.push({
                name: data[i].drilldown.categories[j],
                y: data[i].drilldown.data[j],
                color: Highcharts.Color(data[i].color).brighten(brightness).get()
            });
        }
    }

    // Create the chart
    $('#container').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Comidas por Categorias'
        },
        subtitle: {
            text: 'Source: <a>netmarketshare.com</a>'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
            valueSuffix: '%'
        },
        series: [{
            name: 'Categorias',
            data: browserData,
            size: '35%',
            dataLabels: {
                formatter: function () {
                    return this.y > 5 ? this.point.name : null;
                },
                color: '#ffffff',
                distance: -20
            }
        }, {
            name: 'Versions',
            data: versionsData,
            size: '55%',
            innerSize: '80%',
            dataLabels: {
                formatter: function () {
                    // display only if larger than 1
                    return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + '%' : null;
                }
            }
        }]
    });
});

    });");


?>


  

</div>


<?php

    }
?>

<?php ActiveForm::end(); ?>
</div>
<!-- recipes-recipeanalysis -->


 