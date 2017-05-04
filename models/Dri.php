<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dri".
 *
 * @property integer $id_dri
 * @property string $nutrient
 * @property string $unit
 * @property string $value
 */
class Dri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dri';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nutrient', 'unit', 'value'], 'required'],
            [['value'], 'number'],
            [['nutrient', 'unit'], 'string', 'max' => 2044]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dri' => 'Id Dri',
            'nutrient' => 'Nutrient',
            'unit' => 'Unit',
            'value' => 'Value',
        ];
    }
}
