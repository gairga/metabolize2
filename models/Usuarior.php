<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuarior".
 *
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property integer $id_tipo_login
 * @property integer $genero
 * @property string $peso
 * @property string $altura
 * @property string $edad
 * @property string $email
 * @property integer $id_actividad_fisica
 *
 * @property Actividadf $idActividadFisica
 * @property TipoLogin $idTipoLogin
 */
class Usuarior extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuarior';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'genero', 'peso', 'altura'], 'required'],
            [['id_tipo_login', 'genero', 'id_actividad_fisica'], 'integer'],
            [['edad', 'email'], 'string'],
            [['nombre', 'apellido', 'peso', 'altura'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'id_tipo_login' => 'Id Tipo Login',
            'genero' => 'Genero',
            'peso' => 'Peso',
            'altura' => 'Altura',
            'edad' => 'Edad',
            'email' => 'Email',
            'id_actividad_fisica' => 'Id Actividad Fisica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdActividadFisica()
    {
        return $this->hasOne(Actividadf::className(), ['id_actividad_fisica' => 'id_actividad_fisica']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoLogin()
    {
        return $this->hasOne(TipoLogin::className(), ['id_tipo_login' => 'id_tipo_login']);
    }
}
