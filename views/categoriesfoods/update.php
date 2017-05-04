<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoriesfoods */

$this->title = 'Update Categoriesfoods: ' . ' ' . $model->id_categorias_foods;
$this->params['breadcrumbs'][] = ['label' => 'Categoriesfoods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categorias_foods, 'url' => ['view', 'id' => $model->id_categorias_foods]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoriesfoods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
