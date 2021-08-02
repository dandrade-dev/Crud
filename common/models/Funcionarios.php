<?php

namespace common\models;

use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "funcionarios".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $cpf
 * @property string|null $logradouro
 * @property string|null $cep
 * @property string|null $cidade
 * @property string|null $estado
 * @property int|null $numero
 * @property string|null $complemento
 * @property int $cargo
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property FuncionariosCargo[] $funcionariosCargos
 * @property Cargo[] $cargos
 */
class Funcionarios extends \yii\db\ActiveRecord

{
    public $cargoSelect;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'logradouro', 'cep', 'cidade', 'estado', 'complemento'], 'string', 'max' => 255],
            [['nome', 'cpf', 'logradouro', 'cep', 'cidade', 'estado', 'complemento'], 'required'],
            ['numero','integer'],
            ['numero','required'],

            //Create by
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            //Update by
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            //CargoSelect
            //['cargoSelect','safe'],
            ['cargoSelect','safe'],

        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'cargoSelect', // Editable attribute name
                        'table' => 'funcionarios_cargo', // Name of the junction table
                        'ownAttribute' => 'funcionarios_id', // Name of the column in junction table that represents current model
                        'relatedModel' => Cargo::className(), // Related model class
                        'relatedAttribute' => 'cargo_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ],

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
            'cpf' => 'Cpf',
            'logradouro' => 'Logradouro',
            'cep' => 'Cep',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'cargo' => 'Cargo',
            'created_by' => 'Criado por',
            'updated_by' => 'Atualizado por',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * Gets query for [[FuncionariosCargos]].
     *
     * @return \yii\db\ActiveQuery|FuncionariosCargoQuery
     */
    public function getFuncionariosCargos()
    {
        return $this->hasMany(FuncionariosCargo::className(), ['funcionarios_id' => 'id']);
    }

    /**
     * Gets query for [[Cargos]].
     *
     * @return \yii\db\ActiveQuery|CargoQuery
     */
    public function getCargos()
    {
        return $this->hasMany(Cargo::className(), ['id' => 'cargo_id'])->viaTable('funcionarios_cargo', ['funcionarios_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return FuncionariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FuncionariosQuery(get_called_class());
    }
}
