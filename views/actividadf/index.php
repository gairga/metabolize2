<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActividadfSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividadfs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividadf-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Actividadf', ['create'], ['class' => 'btn btn-success']) ?>
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
