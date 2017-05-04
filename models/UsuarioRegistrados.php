<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario_registrados".
 *
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property integer $id_tipo_login
 * @property integer $genero
 * @property string $peso
 * @property string $altura
 * @property string $edad
 *
 * @property TipoLogin $idTipoLogin
 */
class UsuarioRegistrados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuario_registrados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'id_tipo_login', 'genero', 'peso', 'altura'], 'required'],
            [['id_tipo_login', 'genero'], 'integer'],
            [['edad'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoLogin()
    {
        return $this->hasOne(TipoLogin::className(), ['id_tipo_login' => 'id_tipo_login']);
    }
}
