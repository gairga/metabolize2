<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categoriesrecipes */

$this->title = $model->id_categorias_recipes;
$this->params['breadcrumbs'][] = ['label' => 'Categoriesrecipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoriesrecipes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_categorias_recipes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_categorias_recipes], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_categorias_recipes',
            'descripcion',
        ],
    ]) ?>

</div>
