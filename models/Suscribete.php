<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suscribete".
 *
 * @property integer $id_suscribete
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $notificaciones
 */
class Suscribete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'suscribete';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'email', 'notificaciones'], 'required'],
            [['email'], 'number'],
            [['nombre', 'apellido', 'notificaciones'], 'string', 'max' => 2044]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_suscribete' => 'Id Suscribete',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'email' => 'Email',
            'notificaciones' => 'Notificaciones',
        ];
    }
}
