<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioRegistradosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Registrados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-registrados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Registrados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_usuario',
            'nombre',
            'apellido',
            'id_tipo_login',
            'genero',
            // 'peso',
            // 'altura',
            // 'edad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
