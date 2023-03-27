<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cook}}`.
 */
class m230327_132312_create_cook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public $table = '{{%cook}}';

    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
