<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categoriesfoods;

/**
 * CategoriesfoodsSearch represents the model behind the search form about `app\models\Categoriesfoods`.
 */
class CategoriesfoodsSearch extends Categoriesfoods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categorias_foods'], 'integer'],
            [['descripcon', 'abrev'], 'safe'],
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
        $query = Categoriesfoods::find();

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
            'id_categorias_foods' => $this->id_categorias_foods,
        ]);

        $query->andFilterWhere(['like', 'descripcon', $this->descripcon])
            ->andFilterWhere(['like', 'abrev', $this->abrev]);

        return $dataProvider;
    }
}
