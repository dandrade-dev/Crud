<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cargo".
 *
 * @property int $id
 * @property string $nome
 * @property int $created_at
 * @property int $updated_at
 *
 * @property FuncionariosCargo[] $funcionariosCargos
 * @property Funcionarios[] $funcionarios
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo';
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return[
            TimestampBehavior::class
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['nome','required'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'created_at' => 'Cadastrado em',
            'updated_at' => 'Atualizado em',
        ];
    }

    /**
     * Gets query for [[FuncionariosCargos]].
     *
     * @return \yii\db\ActiveQuery|FuncionariosCargoQuery
     */
    public function getFuncionariosCargos()
    {
        return $this->hasMany(FuncionariosCargo::className(), ['cargo_id' => 'id']);
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery|FuncionariosQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionarios::className(), ['id' => 'funcionarios_id'])->viaTable('funcionarios_cargo', ['cargo_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CargoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CargoQuery(get_called_class());
    }
}
