<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recipes */
/* @var $form ActiveForm */
?>
<div class="recipes-detailanalysis">

    <?php $form = ActiveForm::begin(); 

foreach (array($recipes) as $recetas => $detalle){
   echo '<pre>';
        var_dump($detalle["totalNutrients"]["ENERC_KCAL"]);
   echo '</pre>';
}
echo $energia;
    ?>

        <?= $form->field($model, 'id_usuario_registrados') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'prep') ?>
        <?= $form->field($model, 'yield') ?>
        <?= $form->field($model, 'ingr') ?>
        <?= $form->field($model, 'name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- recipes-detailanalysis -->
