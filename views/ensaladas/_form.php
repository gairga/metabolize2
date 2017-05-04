<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ensaladas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ensaladas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_food_groups')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
