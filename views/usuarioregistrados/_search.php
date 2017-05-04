<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioRegistradosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-registrados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'id_tipo_login') ?>

    <?= $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'peso') ?>

    <?php // echo $form->field($model, 'altura') ?>

    <?php // echo $form->field($model, 'edad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
