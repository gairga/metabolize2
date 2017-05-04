<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriasFoods */

$this->title = 'Update Categorias Foods: ' . ' ' . $model->id_categorias_foods;
$this->params['breadcrumbs'][] = ['label' => 'Categorias Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categorias_foods, 'url' => ['view', 'id' => $model->id_categorias_foods]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categorias-foods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
