<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarior */

$this->title = 'Create Usuarior';
$this->params['breadcrumbs'][] = ['label' => 'Usuariors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarior-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
