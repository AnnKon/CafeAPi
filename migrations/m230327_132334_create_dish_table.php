<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dishes}}`.
 */
class m230327_132334_create_dish_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%dish}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'cook_id' => $this->integer(),
            'name' => $this->string(225),
            'price' => $this->money(),
        ]);

        $this->addForeignKey('fk-cook-dish', $this->table, 'cook_id', '{{%cook}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
