<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ensaladas".
 *
 * @property integer $id_ensalada
 * @property integer $id_food_groups
 */
class Ensaladas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ensaladas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_food_groups'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ensalada' => 'Id Ensalada',
            'id_food_groups' => 'Id Food Groups',
        ];
    }
}
