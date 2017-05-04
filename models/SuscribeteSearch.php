<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Suscribete;

/**
 * SuscribeteSearch represents the model behind the search form about `app\models\Suscribete`.
 */
class SuscribeteSearch extends Suscribete
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_suscribete'], 'integer'],
            [['nombre', 'apellido', 'notificaciones'], 'safe'],
            [['email'], 'number'],
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
        $query = Suscribete::find();

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
            'id_suscribete' => $this->id_suscribete,
            'email' => $this->email,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'notificaciones', $this->notificaciones]);

        return $dataProvider;
    }
}
