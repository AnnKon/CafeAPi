<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%checks}}`.
 */
class m230327_132450_create_check_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%check}}', [
            'id' => $this->primaryKey(),
            'status' => $this->boolean()->defaultValue(true),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%check}}');
    }
}
