<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Recipes".
 *
 * @property integer $id_usuario_registrados
 * @property string $name
 * @property string $title
 * @property string $prep
 * @property string $yield
 * @property string $ingr
 * @property integer $id_recipes
 * @property integer $id_categorias_recipes
 *
 * @property Categoriesrecipes $idCategoriasRecipes
 */
class Recipes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Recipes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario_registrados', 'id_categorias_recipes'], 'integer'],
            [['title', 'prep', 'yield', 'ingr'], 'required'],
            [['title', 'prep', 'yield', 'ingr'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['id_categorias_recipes'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriesrecipes::className(), 'targetAttribute' => ['id_categorias_recipes' => 'id_categorias_recipes']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario_registrados' => 'Id Usuario Registrados',
            'name' => 'Name',
            'title' => 'Title',
            'prep' => 'Prep',
            'yield' => 'Yield',
            'ingr' => 'Ingr',
            'id_recipes' => 'Id Recipes',
            'id_categorias_recipes' => 'Id Categorias Recipes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoriasRecipes()
    {
        return $this->hasOne(Categoriesrecipes::className(), ['id_categorias_recipes' => 'id_categorias_recipes']);
    }
}
