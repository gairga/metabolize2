<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_alimento') ?>

    <?= $form->field($model, 'id_food_groups') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'water_g') ?>

    <?= $form->field($model, 'energ_kcal') ?>

    <?php // echo $form->field($model, 'protein') ?>

    <?php // echo $form->field($model, 'lipid_Tot') ?>

    <?php // echo $form->field($model, 'Ash') ?>

    <?php // echo $form->field($model, 'carbohydrt') ?>

    <?php // echo $form->field($model, 'Fiber_TD') ?>

    <?php // echo $form->field($model, 'Sugar_Tot') ?>

    <?php // echo $form->field($model, 'Calcium') ?>

    <?php // echo $form->field($model, 'Iron') ?>

    <?php // echo $form->field($model, 'Magnesium') ?>

    <?php // echo $form->field($model, 'Phosphorus') ?>

    <?php // echo $form->field($model, 'Sodium') ?>

    <?php // echo $form->field($model, 'Zinc') ?>

    <?php // echo $form->field($model, 'Copper') ?>

    <?php // echo $form->field($model, 'Manganese') ?>

    <?php // echo $form->field($model, 'Selenium') ?>

    <?php // echo $form->field($model, 'Vit_C_mg') ?>

    <?php // echo $form->field($model, 'Thiamin_mg') ?>

    <?php // echo $form->field($model, 'Riboflavin_mg') ?>

    <?php // echo $form->field($model, 'Niacin_mg') ?>

    <?php // echo $form->field($model, 'Panto_Acid_mg') ?>

    <?php // echo $form->field($model, 'Vit_B6_mg') ?>

    <?php // echo $form->field($model, 'Folate_Tot') ?>

    <?php // echo $form->field($model, 'Folic_Acid') ?>

    <?php // echo $form->field($model, 'Food_Folate') ?>

    <?php // echo $form->field($model, 'Folate_DFE') ?>

    <?php // echo $form->field($model, 'Choline_Tot') ?>

    <?php // echo $form->field($model, 'Vit_B12') ?>

    <?php // echo $form->field($model, 'Vit_A_IU') ?>

    <?php // echo $form->field($model, 'Vit_A_RAE') ?>

    <?php // echo $form->field($model, 'Retinol') ?>

    <?php // echo $form->field($model, 'Alpha_Carot') ?>

    <?php // echo $form->field($model, 'Beta_Carot') ?>

    <?php // echo $form->field($model, 'Beta_Crypt') ?>

    <?php // echo $form->field($model, 'Lycopene') ?>

    <?php // echo $form->field($model, 'Lut_Zea') ?>

    <?php // echo $form->field($model, 'Vit_E') ?>

    <?php // echo $form->field($model, 'Vit_D') ?>

    <?php // echo $form->field($model, 'Vit_D_IU') ?>

    <?php // echo $form->field($model, 'Vit_K') ?>

    <?php // echo $form->field($model, 'FA_Sat') ?>

    <?php // echo $form->field($model, 'FA_Mono') ?>

    <?php // echo $form->field($model, 'FA_Poly') ?>

    <?php // echo $form->field($model, 'Cholestrl') ?>

    <?php // echo $form->field($model, 'GmWt_1') ?>

    <?php // echo $form->field($model, 'gmwt_desc1') ?>

    <?php // echo $form->field($model, 'gmwt_2') ?>

    <?php // echo $form->field($model, 'gmwt_desc2') ?>

    <?php // echo $form->field($model, 'refuse_pct') ?>

    <?php // echo $form->field($model, 'id_clasificacion') ?>

    <?php // echo $form->field($model, 'campo1') ?>

    <?php // echo $form->field($model, 'campo2') ?>

    <?php // echo $form->field($model, 'campo3') ?>

    <?php // echo $form->field($model, 'fat') ?>

    <?php // echo $form->field($model, 'prot') ?>

    <?php // echo $form->field($model, 'carb') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
