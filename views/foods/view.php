<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Foods */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Foods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foods-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_food_groups], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_food_groups], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_alimento',
            'id_food_groups',
            'name',
            'water_g',
            'energ_kcal',
            'protein',
            'lipid_Tot',
            'Ash',
            'carbohydrt',
            'Fiber_TD',
            'Sugar_Tot',
            'Calcium',
            'Iron',
            'Magnesium',
            'Phosphorus',
            'Sodium',
            'Zinc',
            'Copper',
            'Manganese',
            'Selenium',
            'Vit_C_mg',
            'Thiamin_mg',
            'Riboflavin_mg',
            'Niacin_mg',
            'Panto_Acid_mg',
            'Vit_B6_mg',
            'Folate_Tot',
            'Folic_Acid',
            'Food_Folate',
            'Folate_DFE',
            'Choline_Tot',
            'Vit_B12',
            'Vit_A_IU',
            'Vit_A_RAE',
            'Retinol',
            'Alpha_Carot',
            'Beta_Carot',
            'Beta_Crypt',
            'Lycopene',
            'Lut_Zea',
            'Vit_E',
            'Vit_D',
            'Vit_D_IU',
            'Vit_K',
            'FA_Sat',
            'FA_Mono',
            'FA_Poly',
            'Cholestrl',
            'GmWt_1',
            'gmwt_desc1',
            'gmwt_2',
            'gmwt_desc2',
            'refuse_pct',
            'id_clasificacion',
            'campo1',
            'campo2',
            'campo3',
            'fat',
            'prot',
            'carb',
        ],
    ]) ?>

</div>
