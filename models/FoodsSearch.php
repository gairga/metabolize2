<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Foods;

/**
 * FoodsSearch represents the model behind the search form about `app\models\Foods`.
 */
class FoodsSearch extends Foods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_alimento', 'id_food_groups'], 'integer'],
            [['name', 'water_g', 'gmwt_desc1', 'gmwt_2', 'gmwt_desc2', 'refuse_pct', 'id_clasificacion', 'campo1', 'campo2', 'campo3', 'fat', 'prot', 'carb'], 'safe'],
            [['energ_kcal', 'protein', 'lipid_Tot', 'Ash', 'carbohydrt', 'Fiber_TD', 'Sugar_Tot', 'Calcium', 'Iron', 'Magnesium', 'Phosphorus', 'Sodium', 'Zinc', 'Copper', 'Manganese', 'Selenium', 'Vit_C_mg', 'Thiamin_mg', 'Riboflavin_mg', 'Niacin_mg', 'Panto_Acid_mg', 'Vit_B6_mg', 'Folate_Tot', 'Folic_Acid', 'Food_Folate', 'Folate_DFE', 'Choline_Tot', 'Vit_B12', 'Vit_A_IU', 'Vit_A_RAE', 'Retinol', 'Alpha_Carot', 'Beta_Carot', 'Beta_Crypt', 'Lycopene', 'Lut_Zea', 'Vit_E', 'Vit_D', 'Vit_D_IU', 'Vit_K', 'FA_Sat', 'FA_Mono', 'FA_Poly', 'Cholestrl', 'GmWt_1'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Foods::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_alimento' => $this->id_alimento,
            'id_food_groups' => $this->id_food_groups,
            'energ_kcal' => $this->energ_kcal,
            'protein' => $this->protein,
            'lipid_Tot' => $this->lipid_Tot,
            'Ash' => $this->Ash,
            'carbohydrt' => $this->carbohydrt,
            'Fiber_TD' => $this->Fiber_TD,
            'Sugar_Tot' => $this->Sugar_Tot,
            'Calcium' => $this->Calcium,
            'Iron' => $this->Iron,
            'Magnesium' => $this->Magnesium,
            'Phosphorus' => $this->Phosphorus,
            'Sodium' => $this->Sodium,
            'Zinc' => $this->Zinc,
            'Copper' => $this->Copper,
            'Manganese' => $this->Manganese,
            'Selenium' => $this->Selenium,
            'Vit_C_mg' => $this->Vit_C_mg,
            'Thiamin_mg' => $this->Thiamin_mg,
            'Riboflavin_mg' => $this->Riboflavin_mg,
            'Niacin_mg' => $this->Niacin_mg,
            'Panto_Acid_mg' => $this->Panto_Acid_mg,
            'Vit_B6_mg' => $this->Vit_B6_mg,
            'Folate_Tot' => $this->Folate_Tot,
            'Folic_Acid' => $this->Folic_Acid,
            'Food_Folate' => $this->Food_Folate,
            'Folate_DFE' => $this->Folate_DFE,
            'Choline_Tot' => $this->Choline_Tot,
            'Vit_B12' => $this->Vit_B12,
            'Vit_A_IU' => $this->Vit_A_IU,
            'Vit_A_RAE' => $this->Vit_A_RAE,
            'Retinol' => $this->Retinol,
            'Alpha_Carot' => $this->Alpha_Carot,
            'Beta_Carot' => $this->Beta_Carot,
            'Beta_Crypt' => $this->Beta_Crypt,
            'Lycopene' => $this->Lycopene,
            'Lut_Zea' => $this->Lut_Zea,
            'Vit_E' => $this->Vit_E,
            'Vit_D' => $this->Vit_D,
            'Vit_D_IU' => $this->Vit_D_IU,
            'Vit_K' => $this->Vit_K,
            'FA_Sat' => $this->FA_Sat,
            'FA_Mono' => $this->FA_Mono,
            'FA_Poly' => $this->FA_Poly,
            'Cholestrl' => $this->Cholestrl,
            'GmWt_1' => $this->GmWt_1,
        ]);

        $query->andFilterWhere(['like', 'name', strtoupper($this->name)])
            ->andFilterWhere(['like', 'water_g', $this->water_g])
            ->andFilterWhere(['like', 'gmwt_desc1', $this->gmwt_desc1])
            ->andFilterWhere(['like', 'gmwt_2', $this->gmwt_2])
            ->andFilterWhere(['like', 'gmwt_desc2', $this->gmwt_desc2])
            ->andFilterWhere(['like', 'refuse_pct', $this->refuse_pct])
            ->andFilterWhere(['like', 'id_clasificacion', $this->id_clasificacion])
            ->andFilterWhere(['like', 'campo1', $this->campo1])
            ->andFilterWhere(['like', 'campo2', $this->campo2])
            ->andFilterWhere(['like', 'campo3', $this->campo3])
            ->andFilterWhere(['like', 'fat', $this->fat])
            ->andFilterWhere(['like', 'prot', $this->prot])
            ->andFilterWhere(['like', 'carb', $this->carb]);

        return $dataProvider;
    }
}
