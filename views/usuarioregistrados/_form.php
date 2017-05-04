<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioRegistrados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-registrados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_login')->textInput() ?>

    <?= $form->field($model, 'genero')->widget(Select2::classname(), [
                'name' => 'genero',
                    'size' => Select2::LARGE,
                    'data' => [1 => "F", 2 => "M"],
                    'options' => [
                        'placeholder' => 'Select a type ...',
                ],
                ]);
    ?>

    <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'altura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
