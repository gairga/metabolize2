<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peso".
 *
 * @property integer $id_peso
 * @property string $descripcion
 *
 * @property Usuarior[] $usuariors
 */
class Peso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_peso' => 'Id Peso',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariors()
    {
        return $this->hasMany(Usuarior::className(), ['id_peso' => 'id_peso']);
    }
}
