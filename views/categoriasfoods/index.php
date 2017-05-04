<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriasFoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias Foods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-foods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Categorias Foods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_categorias_foods',
            'descripcon',
            'abrev',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
