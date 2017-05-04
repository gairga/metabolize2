<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use kartik\widgets\ActiveForm;


//$form = ActiveForm::begin(['id' => 'my-form', 'options'=>['class'=>'my-form']]);
$form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL],
]);
  


/* @var $this yii\web\View */
/* @var $model app\models\Usuarior */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="usuarior-form">

    
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

   <?php echo $form->field($model, 'email', [

    'addon' => ['prepend' => ['content'=>'@']]
]);
 ?>
   
     <?php
  $list = [0 => 'Morning', 1 => 'Noon', 2 => 'Evening'];
 
/* Display a stacked radio list */
//echo $form->field($model, 'contact')->radioList($list);
   ?>
    <?php echo $form->field($model, 'altura', [
        'addon' => ['prepend' => ['content'=>'cm']]
    ]);
     ?>

    <?php echo $form->field($model, 'peso', [
        'addon' => ['prepend' => ['content'=>'Kg']]
    ]);
    ?>

    <?= $form->field($model, 'edad')->textInput() ?>

  <?php $model->id_tipo_login=1; ?>


    <?php echo $form->field($model, 'id_actividad_fisica')->widget(Select2::classname(), [
                'name' => 'id_actividad_fisica',
                    'size' => Select2::MEDIUM,
                    'data' => [1 => "Sedentary", 
                    2 => "Active 1-3", 
                    3 => "Active 3-5",
                    4 => "Very Active 6-7",
                    5 => "Hiperactivo"],
                    'options' => [
                        'placeholder' => 'Select a type ...',
                ],
                ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
