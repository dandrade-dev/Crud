<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%funcionarios}}`.
 */
class m210728_001658_create_funcionarios_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%funcionarios}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(),
            'cpf' => $this->string(),
            'logradouro' => $this->string(),
            'cep' => $this->string(),
            'cidade' => $this->string(),
            'estado' => $this->string(),
            'numero' => $this->integer(),
            'complemento' => $this->string(),
            'cargo' => $this->integer()->notNull(),
            'created_by' =>$this->integer()->notNull(),
            'updated_by' =>$this->integer()->notNull(),
            'created_at' =>$this->integer()->notNull(),
            'updated_at' =>$this->integer()->notNull()

        ]);

        $this->createIndex('idx-func-created_by','{{%funcionarios}}','created_by');
        $this->addForeignKey('fk-func-created_by','{{%funcionarios}}','created_by','{{%user}}','id','CASCADE','CASCADE');

        $this->createIndex('idx-func-updated_by','{{%funcionarios}}','updated_by');
        $this->addForeignKey('fk-func-updated_by','{{%funcionarios}}','updated_by','{{%user}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%funcionarios}}');
    }
}
