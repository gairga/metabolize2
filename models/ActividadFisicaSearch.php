<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActividadFisica;

/**
 * ActividadFisicaSearch represents the model behind the search form about `app\models\ActividadFisica`.
 */
class ActividadFisicaSearch extends ActividadFisica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_actividad_fisica'], 'integer'],
            [['descripcion_actividad_fisica'], 'safe'],
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
        $query = ActividadFisica::find();

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
            'id_actividad_fisica' => $this->id_actividad_fisica,
        ]);

        $query->andFilterWhere(['like', 'descripcion_actividad_fisica', $this->descripcion_actividad_fisica]);

        return $dataProvider;
    }
}
