<?php

namespace app\controllers;

use app\models\Check;
use app\models\Dish;
use app\models\Order;
use Yii;


class CheckController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Check';

    public function actionAdd()
    {
        $request = Yii::$app->request;

        $check = Check::findOne($request->post('check_id'));

        if($check->status == 0) {
            return 'Check closed';
        }

        $addDish = new Order();
        $addDish->dish_id = $request->post('dish_id');
        $addDish->check_id = $request->post('check_id');

        $addDish->save();

        return $addDish;
    }

    public function actionClose($id)
    {

        $model = Check::findOne($id);
        $model->status = 0;
        $model->save();

        return $model;
    }

    public function actionRating($start, $end)
    {

        $orders = Order::find()
            ->select(['dish.name', 'order.dish_id', 'COUNT(order.id) as Quantity'])
            ->joinWith('dish')
            ->filterWhere(['between', 'created_at', $start, $end])
            ->groupBy('order.dish_id')
            ->orderBy(['COUNT(order.id)' => SORT_DESC])
            ->asArray()
            ->all();

        return $orders;
   }



}
