<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categoriesfoods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoriesfoods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abrev')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
