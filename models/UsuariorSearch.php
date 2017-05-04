<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarior;

/**
 * UsuariorSearch represents the model behind the search form about `app\models\Usuarior`.
 */
class UsuariorSearch extends Usuarior
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_tipo_login', 'genero'], 'integer'],
            [['nombre', 'apellido', 'peso', 'altura', 'edad'], 'safe'],
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
        $query = Usuarior::find();

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
            'id_usuario' => $this->id_usuario,
            'id_tipo_login' => $this->id_tipo_login,
            'genero' => $this->genero,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'peso', $this->peso])
            ->andFilterWhere(['like', 'altura', $this->altura])
            ->andFilterWhere(['like', 'edad', $this->edad]);

        return $dataProvider;
    }
}
