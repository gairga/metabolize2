<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoriesrecipes".
 *
 * @property integer $id_categorias_recipes
 * @property string $descripcion
 *
 * @property Recipes[] $recipes
 */
class Categoriesrecipes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoriesrecipes';
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
            'id_categorias_recipes' => 'Id Categorias Recipes',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipes::className(), ['id_categorias_recipes' => 'id_categorias_recipes']);
    }
}
