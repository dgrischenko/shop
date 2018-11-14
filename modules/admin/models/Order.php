<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property double $sum
 * @property string $status
 * @property string $name
 * @property string $abr
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    public function getOrdertItems(){
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'), // T.K. вместо метки времени UNIX используется datetime:
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'qty', 'sum', 'abr','status', 'name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at', ], 'safe'],
            [['status', 'name','sum', 'email', 'abr','phone', 'address'], 'string'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => '№ заказа',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'qty' =>'Кол-во',
            'sum' => 'Сумма',
            'abr' => 'Валюта',
            'status' => 'Статус заказа',
            'name' => 'Имя',
            'email' => 'Е-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',


        ];
    }
}
