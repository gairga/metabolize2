<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ensaladas */

$this->title = 'Update Ensaladas: ' . $model->id_ensalada;
$this->params['breadcrumbs'][] = ['label' => 'Ensaladas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ensalada, 'url' => ['view', 'id' => $model->id_ensalada]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ensaladas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
