<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Categoriesfoods */

$this->title = 'Create Categoriesfoods';
$this->params['breadcrumbs'][] = ['label' => 'Categoriesfoods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoriesfoods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
