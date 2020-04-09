<?php

namespace app\controllers;

use app\models\Country;
use app\models\Order;
use app\models\OrderType;
use Yii;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $model = new Order();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Order successfully saved.');
                $model = new Order();
            } else {
                Yii::$app->session->setFlash('error', 'There was an error in saving your order.');
            }
        }
        return $this->render('index', [
            'model' => $model,
            'countryList' => $this->countryList(),
            'orderTypeList' => $this->orderTypeList(),
            'orderData' => $this->orderData(),
            'mapPoints' => $this->orderData()
        ]);
    }

    /**
     * @return array
     */
    public function countryList() {

        return Country::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();
    }

    /**
     * @return array
     */
    public function orderTypeList() {

        return OrderType::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();
    }

    /**
     * @return array
     */
    public function orderData()
    {
        return Order::find()
            ->where(['removed' => false])
            ->orderBy(['scheduled_date' => SORT_DESC])
            ->all();
    }
}
