<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%funcionarios_cargo}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%funcionarios}}`
 * - `{{%cargo}}`
 */
class m210728_004819_create_junction_table_for_funcionarios_and_cargo_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%funcionarios_cargo}}', [
            'funcionarios_id' => $this->integer(),
            'cargo_id' => $this->integer(),
            'PRIMARY KEY(funcionarios_id, cargo_id)',
        ]);

        // creates index for column `funcionarios_id`
        $this->createIndex(
            '{{%idx-funcionarios_cargo-funcionarios_id}}',
            '{{%funcionarios_cargo}}',
            'funcionarios_id'
        );

        // add foreign key for table `{{%funcionarios}}`
        $this->addForeignKey(
            '{{%fk-funcionarios_cargo-funcionarios_id}}',
            '{{%funcionarios_cargo}}',
            'funcionarios_id',
            '{{%funcionarios}}',
            'id',
            'CASCADE'
        );

        // creates index for column `cargo_id`
        $this->createIndex(
            '{{%idx-funcionarios_cargo-cargo_id}}',
            '{{%funcionarios_cargo}}',
            'cargo_id'
        );

        // add foreign key for table `{{%cargo}}`
        $this->addForeignKey(
            '{{%fk-funcionarios_cargo-cargo_id}}',
            '{{%funcionarios_cargo}}',
            'cargo_id',
            '{{%cargo}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%funcionarios_cargo}}');
    }
}
