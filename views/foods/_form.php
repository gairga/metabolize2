<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Foods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_food_groups')->textInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'water_g')->textInput() ?>

    <?= $form->field($model, 'energ_kcal')->textInput() ?>

    <?= $form->field($model, 'protein')->textInput() ?>

    <?= $form->field($model, 'lipid_Tot')->textInput() ?>

    <?= $form->field($model, 'Ash')->textInput() ?>

    <?= $form->field($model, 'carbohydrt')->textInput() ?>

    <?= $form->field($model, 'Fiber_TD')->textInput() ?>

    <?= $form->field($model, 'Sugar_Tot')->textInput() ?>

    <?= $form->field($model, 'Calcium')->textInput() ?>

    <?= $form->field($model, 'Iron')->textInput() ?>

    <?= $form->field($model, 'Magnesium')->textInput() ?>

    <?= $form->field($model, 'Phosphorus')->textInput() ?>

    <?= $form->field($model, 'Sodium')->textInput() ?>

    <?= $form->field($model, 'Zinc')->textInput() ?>

    <?= $form->field($model, 'Copper')->textInput() ?>

    <?= $form->field($model, 'Manganese')->textInput() ?>

    <?= $form->field($model, 'Selenium')->textInput() ?>

    <?= $form->field($model, 'Vit_C_mg')->textInput() ?>

    <?= $form->field($model, 'Thiamin_mg')->textInput() ?>

    <?= $form->field($model, 'Riboflavin_mg')->textInput() ?>

    <?= $form->field($model, 'Niacin_mg')->textInput() ?>

    <?= $form->field($model, 'Panto_Acid_mg')->textInput() ?>

    <?= $form->field($model, 'Vit_B6_mg')->textInput() ?>

    <?= $form->field($model, 'Folate_Tot')->textInput() ?>

    <?= $form->field($model, 'Folic_Acid')->textInput() ?>

    <?= $form->field($model, 'Food_Folate')->textInput() ?>

    <?= $form->field($model, 'Folate_DFE')->textInput() ?>

    <?= $form->field($model, 'Choline_Tot')->textInput() ?>

    <?= $form->field($model, 'Vit_B12')->textInput() ?>

    <?= $form->field($model, 'Vit_A_IU')->textInput() ?>

    <?= $form->field($model, 'Vit_A_RAE')->textInput() ?>

    <?= $form->field($model, 'Retinol')->textInput() ?>

    <?= $form->field($model, 'Alpha_Carot')->textInput() ?>

    <?= $form->field($model, 'Beta_Carot')->textInput() ?>

    <?= $form->field($model, 'Beta_Crypt')->textInput() ?>

    <?= $form->field($model, 'Lycopene')->textInput() ?>

    <?= $form->field($model, 'Lut_Zea')->textInput() ?>

    <?= $form->field($model, 'Vit_E')->textInput() ?>

    <?= $form->field($model, 'Vit_D')->textInput() ?>

    <?= $form->field($model, 'Vit_D_IU')->textInput() ?>

    <?= $form->field($model, 'Vit_K')->textInput() ?>

    <?= $form->field($model, 'FA_Sat')->textInput() ?>

    <?= $form->field($model, 'FA_Mono')->textInput() ?>

    <?= $form->field($model, 'FA_Poly')->textInput() ?>

    <?= $form->field($model, 'Cholestrl')->textInput() ?>

    <?= $form->field($model, 'GmWt_1')->textInput() ?>

    <?= $form->field($model, 'gmwt_desc1')->textInput() ?>

    <?= $form->field($model, 'gmwt_2')->textInput() ?>

    <?= $form->field($model, 'gmwt_desc2')->textInput() ?>

    <?= $form->field($model, 'refuse_pct')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_clasificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campo3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carb')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
