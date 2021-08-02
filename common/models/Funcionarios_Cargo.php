<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "funcionarios_cargo".
 *
 * @property int $funcionarios_id
 * @property int $cargo_id
 *
 * @property Cargo $cargo
 * @property Funcionarios $funcionarios
 */
class Funcionarios_Cargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionarios_cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['funcionarios_id', 'cargo_id'], 'required'],
            [['funcionarios_id', 'cargo_id'], 'integer'],
            [['funcionarios_id', 'cargo_id'], 'unique', 'targetAttribute' => ['funcionarios_id', 'cargo_id']],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['cargo_id' => 'id']],
            [['funcionarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionarios::className(), 'targetAttribute' => ['funcionarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'funcionarios_id' => 'Funcionarios ID',
            'cargo_id' => 'Cargo ID',
        ];
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery|CargoQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id' => 'cargo_id']);
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery|FuncionariosQuery
     */
    public function getFuncionarios()
    {
        return $this->hasOne(Funcionarios::className(), ['id' => 'funcionarios_id']);
    }

    /**
     * {@inheritdoc}
     * @return Funcionarios_CargoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new Funcionarios_CargoQuery(get_called_class());
    }
}
