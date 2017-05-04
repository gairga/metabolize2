<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dri;

/**
 * DriSearch represents the model behind the search form about `app\models\Dri`.
 */
class DriSearch extends Dri
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dri'], 'integer'],
            [['nutrient', 'unit'], 'safe'],
            [['value'], 'number'],
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
        $query = Dri::find();

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
            'id_dri' => $this->id_dri,
            'value' => $this->value,
        ]);

        $query->andFilterWhere(['like', 'nutrient', $this->nutrient])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
