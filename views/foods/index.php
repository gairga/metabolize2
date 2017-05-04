<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Foods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          
            'id_food_groups',
            'name',
            'id_clasificacion',
            'gmwt_desc1',
            'GmWt_1',
            'campo3',
      
            // 'lipid_Tot',
            // 'Ash',
            // 'carbohydrt',
            // 'Fiber_TD',
            // 'Sugar_Tot',
            // 'Calcium',
            // 'Iron',
            // 'Magnesium',
            // 'Phosphorus',
            // 'Sodium',
            // 'Zinc',
            // 'Copper',
            // 'Manganese',
            // 'Selenium',
            // 'Vit_C_mg',
            // 'Thiamin_mg',
            // 'Riboflavin_mg',
            // 'Niacin_mg',
            // 'Panto_Acid_mg',
            // 'Vit_B6_mg',
            // 'Folate_Tot',
            // 'Folic_Acid',
            // 'Food_Folate',
            // 'Folate_DFE',
            // 'Choline_Tot',
            // 'Vit_B12',
            // 'Vit_A_IU',
            // 'Vit_A_RAE',
            // 'Retinol',
            // 'Alpha_Carot',
            // 'Beta_Carot',
            // 'Beta_Crypt',
            // 'Lycopene',
            // 'Lut_Zea',
            // 'Vit_E',
            // 'Vit_D',
            // 'Vit_D_IU',
            // 'Vit_K',
            // 'FA_Sat',
            // 'FA_Mono',
            // 'FA_Poly',
            // 'Cholestrl',
            // 'GmWt_1',
            // 'gmwt_desc1',
            // 'gmwt_2',
            // 'gmwt_desc2',
            // 'refuse_pct',
            // 'id_clasificacion',
            // 'campo1',
            // 'campo2',
            // 'campo3',
            // 'fat',
            // 'prot',
            // 'carb',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
