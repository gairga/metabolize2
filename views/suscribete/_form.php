<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Suscribete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="suscribete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput() ?>

   
    <?php echo $form->field($model, 'notificaciones')->widget(Select2::classname(), [
                'name' => 'notificaciones',
                    'size' => Select2::LARGE,
                    'data' => [1 => "Monthly", 2 => "Weekly"],
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
