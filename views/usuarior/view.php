<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\Highstock;
use miloschuman\highcharts\SeriesDataHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarior */

$this->title = $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuariors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarior-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_usuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_usuario',
            'nombre',
          //  'apellido',
            'id_tipo_login',
            'genero',
            'peso',
            'altura',
            'edad',
           'id_actividad_fisica',
        ],
    ]) ?>
<!--
TBM Tasa de Metabolismo Basal 
MUJER: 655 + (9,6 * $) + (1,8 * A) – (4,7 * E)
TMB Hombre = 66 + (13,7 * P) + (5 * A) – (6,8 * E)

Ejemplo A: 2040 x 1.55 = 3162 Kcal 
Ejemplo B: 1933,30 x 1.55 = 2996,62 Kcal 
Ejemplo C: 1948,96 x 1.55 = 3020,88 Kcal

MB

MB Hombre: 1 caloría x peso en Kg. x 24 Horas  
MB Mujer: 0,9 calorías x peso en Kg. x 24 Horas 
Ejemplo A: 1 x 85 x 24 h = 2040 kcal

requerimiento calórico

Ejemplo A: 2040 x 1.55 = 3162 Kcal 
Ejemplo B: 1933,30 x 1.55 = 2996,62 Kcal 
Ejemplo C: 1948,96 x 1.55 = 3020,88 Kcal
-->
<?php 
$total=0;
$total=66.473+(13.751*$model->peso)+(5.0033*$model->altura)-(6.55*$model->edad);
$mbw=0.9*$model->peso*24;
$mbm=1.0*$model->peso*24;
$af=0;
$usaavguno=0;
$usaavgdos=0;
$usaavgtres=0;
$porcentajedos=0;
?>
<table class="table table-sm">
  <thead>
    <tr>
      <th>#</th>
      <th>TBM</th>

      <th>requerimiento calórico</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>
        <?php echo $total;?> Kcal
      </td>

      <td><?php 

      switch($model->id_actividad_fisica){
                                                        //calcular el requerimiento calórico
                                                        case "1":
                                                        $af=$total*1.2;
                                                        break;
                                                        case "2":
                                                        $af=$total*1.375;
                                                        break;
                                                        case "3":
                                                        $af=$total*1.55;
                                                        break;
                                                        case "4":
                                                        $af=$total*1.725;
                                                        break;
                                                        case "5":
                                                        $af=$total*1.9;
                                                        break;
                                                        default:                      
                                                }

        echo $af;
      ?>
          
      </td>
    </tr>
 <img src="imagenes/manito.png"/>
<!--
amount of carbs = (total calories * (% from carbs / 100)) / 4
amount of protein = (total calories * (% from protein / 100)) / 4
amount of fat = (total calories * (% from fat) / 100)) / 9
-->

<div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
    <?php echo ($total*0.4)/4 ?>%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
    <?php echo $mbw*0.4/4 ?>%
  </div>
</div>

<div class="progress">
  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
    <?php echo $mbw*0.4/9 ?>%
  </div>
</div>
  </tbody>
</table>

<table class="table table-sm">
  <thead>
    <tr>
      <th>#</th>
      <th>TBM</th>

      <th>requerimiento calórico</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>
        <?php echo $total;?> Kcal
      </td>

      <td><?php 

      switch($model->id_actividad_fisica){
                                                        //calcular el requerimiento calórico
                                                        case "1":
                                                        $af=$total*1.2;
                                                        break;
                                                        case "2":
                                                        $af=$total*1.375;
                                                        break;
                                                        case "3":
                                                        $af=$total*1.55;
                                                        break;
                                                        case "4":
                                                        $af=$total*1.725;
                                                        break;
                                                        case "5":
                                                        $af=$total*1.9;
                                                        break;
                                                        default:                      
                                                }

        echo $af;
      ?>
          
      </td>
    </tr>
    </table>



<table class="table table-sm">
  <thead>
    <tr>
      <th>%</th>
      <th>USA AVG</th>
      <th>GRAMOS</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>25%</td>
        <td><?php echo $usaavguno=($total*25/100) ?></td>
        <td><?php echo $usaavguno/4 ?></td>
    </tr>

    <tr>
        <td>50%</td>
        <td><?php echo $usaavgdos=($total*50/100) ?></td>
        <td><?php echo $usaavgdos/4 ?></td>
    </tr>

    <tr>
        <td>25%</td>
        <td><?php echo $usaavgtres=($total*25/100) ?></td>
        <td><?php echo $usaavgtres/9 ?></td>
    </tr>

  </tbody>
  </table>


  <table class="table table-sm">
  <thead>
    <tr>
      <th>Sed <?php echo $af?></th>
      <th>Cals</th>
      <th>Gramos</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>
          25
50
30

      <?php 

      switch($model->id_actividad_fisica){
                                                        //calcular el requerimiento calórico 
                                                        case "1":
                                                        $porcentajedos=25;
                                                        break;
                                                        case "2":
                                                         $porcentajedos=25;
                                                        break;
                                                        case "3":
                                                         $porcentajedos=25;
                                                        break;
                                                        case "4":
                                                         $porcentajedos=30;
                                                        break;
                                                        case "5":
                                                         $porcentajedos=30;
                                                        break;
                                                        default:                      
                                                }

        echo $porcentajedos; 
      ?>%
          

        </td>
        <td><?php echo $usaavguno=($total*$porcentajedos/100) ?></td>
        <td><?php echo $usaavguno/4 ?></td>
    </tr>

    <tr>
        <td>45%</td>
        <td><?php echo $usaavgdos=($total*50/100) ?></td>
        <td><?php echo $usaavgdos/4 ?></td>
    </tr>

    <tr>
        <td>30%</td>
        <td><?php echo $usaavgtres=($total*25/100) ?></td>
        <td><?php echo $usaavgtres/9 ?></td>
    </tr>

  </tbody>
  </table>

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
                    ['Protein', $usaavguno], //Fat(104) - Saturated (35)
                    ['Carb', $usaavgdos],
                    ['FRUIT', $usaavgtres],
      
        

                    //Total Fat Total (104)+Carb(27)+Pro (98)
                ],
            ] // new closing bracket
        ],
    ],
]);

?>

</div>