<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActividadFisicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividad Fisicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividad-fisica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Actividad Fisica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_actividad_fisica',
            'descripcion_actividad_fisica',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
