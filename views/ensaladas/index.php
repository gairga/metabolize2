<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnsaladasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ensaladas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ensaladas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ensaladas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ensalada',
            'id_food_groups',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
