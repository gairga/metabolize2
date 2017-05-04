<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActividadFisica */

$this->title = 'Update Actividad Fisica: ' . ' ' . $model->id_actividad_fisica;
$this->params['breadcrumbs'][] = ['label' => 'Actividad Fisicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_actividad_fisica, 'url' => ['view', 'id' => $model->id_actividad_fisica]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actividad-fisica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
