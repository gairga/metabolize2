<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Standard;
use app\models\Categoriesrecipes;

/* @var $this yii\web\View */
/* @var $model app\models\Recipes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipes-form">
    

    <?php $form = ActiveForm::begin(); ?>
   <?php $model->id_usuario_registrados=1;?>

   <?=  Html::Label('Categorias Recetas'); ?></br>
   <?= Html::activeDropDownList($model, 'id_categorias_recipes',
      ArrayHelper::map(Categoriesrecipes::find()->all(), 'id_categorias_recipes', 'descripcion')) 

    ?>

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
