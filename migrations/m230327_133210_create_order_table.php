<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m230327_133210_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public $table = '{{%order}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'check_id' => $this->integer(),
            'dish_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk-check-order', $this->table, 'check_id', '{{%check}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-dish-order', $this->table, 'dish_id', '{{%dish}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
