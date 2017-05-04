<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ActividadFisica */

$this->title = 'Create Actividad Fisica';
$this->params['breadcrumbs'][] = ['label' => 'Actividad Fisicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-fisica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
