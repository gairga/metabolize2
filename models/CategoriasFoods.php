<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorias_foods".
 *
 * @property integer $id_categorias_foods
 * @property string $descripcon
 * @property string $abrev
 */
class CategoriasFoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorias_foods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['abrev'], 'string'],
            [['descripcon'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categorias_foods' => 'Id Categorias Foods',
            'descripcon' => 'Descripcon',
            'abrev' => 'Abrev',
        ];
    }

    public function getIdClasifoods($id)
    {
        $data=CategoriasFoods::find()->where(['id_categorias_foods'=>$id])->All();
        if(empty($data))
            return 0;
        else{
            $query = (new \yii\db\Query())->select('cuenta')->where(['act_lot_con_id_alc'=>$id])->from('avance');
            $sum = $query->max('cuenta');
            //echo $sum;die;
            return $sum;
        }
    }
}
