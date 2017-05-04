<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Recipes;

/**
 * RecipesSearch represents the model behind the search form about `app\models\Recipes`.
 */
class RecipesSearch extends Recipes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario_registrados', 'id_recipes'], 'integer'],
            [['name', 'title', 'prep', 'yield', 'ingr'], 'safe'],
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
        $query = Recipes::find();

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
            'id_usuario_registrados' => $this->id_usuario_registrados,
            'id_recipes' => $this->id_recipes,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'prep', $this->prep])
            ->andFilterWhere(['like', 'yield', $this->yield])
            ->andFilterWhere(['like', 'ingr', $this->ingr]);

        return $dataProvider;
    }
}
