<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Actividadf */

$this->title = $model->id_actividad_fisica;
$this->params['breadcrumbs'][] = ['label' => 'Actividadfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividadf-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_actividad_fisica], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_actividad_fisica], [
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
            'id_actividad_fisica',
            'descripcion_actividad_fisica',
        ],
    ]) ?>

</div>
