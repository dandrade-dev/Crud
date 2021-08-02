<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cargo}}`.
 */
class m210728_001731_create_cargo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cargo}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'created_at' =>$this->integer()->notNull(),
            'updated_at' =>$this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cargo}}');
    }
}
