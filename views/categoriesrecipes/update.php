<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoriesrecipes */

$this->title = 'Update Categoriesrecipes: ' . $model->id_categorias_recipes;
$this->params['breadcrumbs'][] = ['label' => 'Categoriesrecipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categorias_recipes, 'url' => ['view', 'id' => $model->id_categorias_recipes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoriesrecipes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
