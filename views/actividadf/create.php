<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Actividadf */

$this->title = 'Create Actividadf';
$this->params['breadcrumbs'][] = ['label' => 'Actividadfs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividadf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
