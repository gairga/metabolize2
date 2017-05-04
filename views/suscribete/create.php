<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Suscribete */

$this->title = 'Subscribe';
$this->params['breadcrumbs'][] = ['label' => 'Suscribetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suscribete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
