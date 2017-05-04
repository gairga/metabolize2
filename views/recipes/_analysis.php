<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recipes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-form">
    
<?php

foreach (array($recipes) as $recetas => $detalle){
   echo '<pre>';
        var_dump($detalle["totalNutrients"]["ENERC_KCAL"]);
   echo '</pre>';
}
?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario_registrados')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'prep')->textInput() ?>

    <?= $form->field($model, 'yield')->textInput() ?>

    <?= $form->field($model, 'ingr')->textArea(['rows' => '6']) ?>
  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
