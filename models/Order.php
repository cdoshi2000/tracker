<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property int $order_type_id
 * @property float $order_value
 * @property string $scheduled_date
 * @property string $street_address
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property int $country_id
 *
 * @property Country $country
 * @property OrderType $orderType
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'phone_number', 'order_type_id', 'order_value', 'scheduled_date', 'street_address', 'city', 'state', 'country_id'], 'required'],
            [['order_type_id', 'country_id', 'removed'], 'integer'],
            [['order_value'], 'number'],
            [['scheduled_date'], 'date', 'format' => 'yyyy/mm/dd'],
            [['street_address'], 'string'],
            [['first_name', 'last_name', 'email', 'phone_number', 'city', 'state', 'zip_code'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['order_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderType::className(), 'targetAttribute' => ['order_type_id' => 'id']],
            [['order_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::className(), 'targetAttribute' => ['order_status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'order_type_id' => 'Order Type',
            'order_status_id' => 'Order Status',
            'order_value' => 'Order Value',
            'scheduled_date' => 'Scheduled Date',
            'street_address' => 'Street Address',
            'city' => 'City',
            'state' => 'State / Province',
            'zip_code' => 'Postal / Zip Code',
            'country_id' => 'Country',
            'removed' => 'Removed',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * Gets query for [[OrderType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderType()
    {
        return $this->hasOne(OrderType::className(), ['id' => 'order_type_id']);
    }

    /**
     * Gets query for [[OrderStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatus()
    {
        return $this->hasOne(OrderStatus::className(), ['id' => 'order_status_id']);
    }
}
