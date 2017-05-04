<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Suscribete */

$this->title = 'Update Suscribete: ' . ' ' . $model->id_suscribete;
$this->params['breadcrumbs'][] = ['label' => 'Suscribetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_suscribete, 'url' => ['view', 'id' => $model->id_suscribete]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="suscribete-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
