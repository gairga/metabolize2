<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dri */

$this->title = $model->id_dri;
$this->params['breadcrumbs'][] = ['label' => 'Dris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dri-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_dri], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_dri], [
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
            'id_dri',
            'nutrient',
            'unit',
            'value',
        ],
    ]) ?>

</div>
