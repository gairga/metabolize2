<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Foods".
 *
 * @property integer $id_alimento
 * @property integer $id_food_groups
 * @property string $name
 * @property string $water_g
 * @property string $energ_kcal
 * @property string $protein
 * @property string $lipid_Tot
 * @property string $Ash
 * @property string $carbohydrt
 * @property string $Fiber_TD
 * @property string $Sugar_Tot
 * @property string $Calcium
 * @property string $Iron
 * @property string $Magnesium
 * @property string $Phosphorus
 * @property string $Sodium
 * @property string $Zinc
 * @property string $Copper
 * @property string $Manganese
 * @property string $Selenium
 * @property string $Vit_C_mg
 * @property string $Thiamin_mg
 * @property string $Riboflavin_mg
 * @property string $Niacin_mg
 * @property string $Panto_Acid_mg
 * @property string $Vit_B6_mg
 * @property string $Folate_Tot
 * @property string $Folic_Acid
 * @property string $Food_Folate
 * @property string $Folate_DFE
 * @property string $Choline_Tot
 * @property string $Vit_B12
 * @property string $Vit_A_IU
 * @property string $Vit_A_RAE
 * @property string $Retinol
 * @property string $Alpha_Carot
 * @property string $Beta_Carot
 * @property string $Beta_Crypt
 * @property string $Lycopene
 * @property string $Lut_Zea
 * @property string $Vit_E
 * @property string $Vit_D
 * @property string $Vit_D_IU
 * @property string $Vit_K
 * @property string $FA_Sat
 * @property string $FA_Mono
 * @property string $FA_Poly
 * @property string $Cholestrl
 * @property string $GmWt_1
 * @property string $gmwt_desc1
 * @property string $gmwt_2
 * @property string $gmwt_desc2
 * @property string $refuse_pct
 * @property string $id_clasificacion
 * @property string $campo1
 * @property string $campo2
 * @property string $campo3
 * @property string $fat
 * @property string $prot
 * @property string $carb
 * @property integer $id_clasif
 *
 * @property Categoriesfoods $idClasif
 */
class Foods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Foods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_food_groups', 'id_clasificacion', 'campo1', 'campo2', 'campo3', 'fat', 'prot', 'carb'], 'required'],
            [['id_food_groups', 'id_clasif'], 'integer'],
            [['name', 'water_g', 'gmwt_desc1', 'gmwt_2', 'gmwt_desc2'], 'string'],
            [['energ_kcal', 'protein', 'lipid_Tot', 'Ash', 'carbohydrt', 'Fiber_TD', 'Sugar_Tot', 'Calcium', 'Iron', 'Magnesium', 'Phosphorus', 'Sodium', 'Zinc', 'Copper', 'Manganese', 'Selenium', 'Vit_C_mg', 'Thiamin_mg', 'Riboflavin_mg', 'Niacin_mg', 'Panto_Acid_mg', 'Vit_B6_mg', 'Folate_Tot', 'Folic_Acid', 'Food_Folate', 'Folate_DFE', 'Choline_Tot', 'Vit_B12', 'Vit_A_IU', 'Vit_A_RAE', 'Retinol', 'Alpha_Carot', 'Beta_Carot', 'Beta_Crypt', 'Lycopene', 'Lut_Zea', 'Vit_E', 'Vit_D', 'Vit_D_IU', 'Vit_K', 'FA_Sat', 'FA_Mono', 'FA_Poly', 'Cholestrl', 'GmWt_1'], 'number'],
            [['refuse_pct'], 'string', 'max' => 10],
            [['id_clasificacion', 'campo1', 'campo2', 'campo3', 'fat', 'prot', 'carb'], 'string', 'max' => 2044],
            [['id_clasif'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriesfoods::className(), 'targetAttribute' => ['id_clasif' => 'id_categorias_foods']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_alimento' => 'Id Alimento',
            'id_food_groups' => 'Id Food Groups',
            'name' => 'Name',
            'water_g' => 'Water G',
            'energ_kcal' => 'Energ Kcal',
            'protein' => 'Protein',
            'lipid_Tot' => 'Lipid  Tot',
            'Ash' => 'Ash',
            'carbohydrt' => 'Carbohydrt',
            'Fiber_TD' => 'Fiber  Td',
            'Sugar_Tot' => 'Sugar  Tot',
            'Calcium' => 'Calcium',
            'Iron' => 'Iron',
            'Magnesium' => 'Magnesium',
            'Phosphorus' => 'Phosphorus',
            'Sodium' => 'Sodium',
            'Zinc' => 'Zinc',
            'Copper' => 'Copper',
            'Manganese' => 'Manganese',
            'Selenium' => 'Selenium',
            'Vit_C_mg' => 'Vit  C Mg',
            'Thiamin_mg' => 'Thiamin Mg',
            'Riboflavin_mg' => 'Riboflavin Mg',
            'Niacin_mg' => 'Niacin Mg',
            'Panto_Acid_mg' => 'Panto  Acid Mg',
            'Vit_B6_mg' => 'Vit  B6 Mg',
            'Folate_Tot' => 'Folate  Tot',
            'Folic_Acid' => 'Folic  Acid',
            'Food_Folate' => 'Food  Folate',
            'Folate_DFE' => 'Folate  Dfe',
            'Choline_Tot' => 'Choline  Tot',
            'Vit_B12' => 'Vit  B12',
            'Vit_A_IU' => 'Vit  A  Iu',
            'Vit_A_RAE' => 'Vit  A  Rae',
            'Retinol' => 'Retinol',
            'Alpha_Carot' => 'Alpha  Carot',
            'Beta_Carot' => 'Beta  Carot',
            'Beta_Crypt' => 'Beta  Crypt',
            'Lycopene' => 'Lycopene',
            'Lut_Zea' => 'Lut  Zea',
            'Vit_E' => 'Vit  E',
            'Vit_D' => 'Vit  D',
            'Vit_D_IU' => 'Vit  D  Iu',
            'Vit_K' => 'Vit  K',
            'FA_Sat' => 'Fa  Sat',
            'FA_Mono' => 'Fa  Mono',
            'FA_Poly' => 'Fa  Poly',
            'Cholestrl' => 'Cholestrl',
            'GmWt_1' => 'Gm Wt 1',
            'gmwt_desc1' => 'Gmwt Desc1',
            'gmwt_2' => 'Gmwt 2',
            'gmwt_desc2' => 'Gmwt Desc2',
            'refuse_pct' => 'Refuse Pct',
            'id_clasificacion' => 'Id Clasificacion',
            'campo1' => 'Campo1',
            'campo2' => 'Campo2',
            'campo3' => 'Campo3',
            'fat' => 'Fat',
            'prot' => 'Prot',
            'carb' => 'Carb',
            'id_clasif' => 'Id Clasif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClasif()
    {
        return $this->hasOne(Categoriesfoods::className(), ['id_categorias_foods' => 'id_clasif']);
    }
}
