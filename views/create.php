<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Categoriesrecipes */

$this->title = 'Create Categoriesrecipes';
$this->params['breadcrumbs'][] = ['label' => 'Categoriesrecipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoriesrecipes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
