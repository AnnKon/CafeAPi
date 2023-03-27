<?php

use yii\db\Migration;

/**
 * Class m230327_135559_seed_cook_table
 */
class m230327_135559_seed_cook_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        $this->insertFakeCooks();
    }

    private function insertFakeCooks()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $this->insert(
                'cook',
                [
                    'name' => $faker->name
                ]
            );
        }

    }



    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230327_135559_seed_cook_table cannot be reverted.\n";

        return false;
    }
    */
}
