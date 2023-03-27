<?php

use app\models\Cook;
use yii\db\Migration;

/**
 * Class m230327_135615_seed_dish_table
 */
class m230327_135615_seed_dish_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {

        $this->insertFakeDishes();
    }

    private function insertFakeDishes()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 30; $i++) {
            $this->insert(
                'dish',
                [
                    'name'       => $faker->name,
                    'price'       => (int)$faker->randomNumber(),
                    'cook_id' => $faker->numberBetween(1, 10),
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
        echo "m230327_135615_seed_dish_table cannot be reverted.\n";

        return false;
    }
    */
}
