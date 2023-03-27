<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property int $id
 * @property int|null $cook_id
 * @property string|null $name
 * @property float|null $price
 *
 * @property Cook $cook
 * @property Order[] $orders
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cook_id'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 225],
            [['cook_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cook::class, 'targetAttribute' => ['cook_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cook_id' => 'Cook ID',
            'name' => 'Name',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Cook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCook()
    {
        return $this->hasOne(Cook::class, ['id' => 'cook_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['dish_id' => 'id']);
    }

}
