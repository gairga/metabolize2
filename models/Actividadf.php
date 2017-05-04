<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Actividadf".
 *
 * @property integer $id_actividad_fisica
 * @property string $descripcion_actividad_fisica
 */
class Actividadf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Actividadf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion_actividad_fisica'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_actividad_fisica' => 'Id Actividad Fisica',
            'descripcion_actividad_fisica' => 'Descripcion Actividad Fisica',
        ];
    }
}
