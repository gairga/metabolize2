<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Food_groups".
 *
 * @property integer $id_food_groups
 * @property string $name
 */
class FoodGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Food_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_food_groups' => 'Id Food Groups',
            'name' => 'Name',
        ];
    }
}
