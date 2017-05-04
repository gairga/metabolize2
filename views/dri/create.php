<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dri */

$this->title = 'Create Dri';
$this->params['breadcrumbs'][] = ['label' => 'Dris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dri-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
