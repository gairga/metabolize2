<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ensaladas */

$this->title = 'Create Ensaladas';
$this->params['breadcrumbs'][] = ['label' => 'Ensaladas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ensaladas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
