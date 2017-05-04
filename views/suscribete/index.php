<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuscribeteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suscribetes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suscribete-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Suscribete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_suscribete',
            'nombre',
            'apellido',
            'email:email',
            'notificaciones',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
