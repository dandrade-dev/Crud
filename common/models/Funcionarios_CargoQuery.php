<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Funcionarios_Cargo]].
 *
 * @see Funcionarios_Cargo
 */
class Funcionarios_CargoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Funcionarios_Cargo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Funcionarios_Cargo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
