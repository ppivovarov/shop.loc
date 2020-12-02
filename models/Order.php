<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * Class Order
 *
 * @property int $id;
 * @property string $created_at;
 * @property string $updated_at;
 * @property int $qty;
 * @property float $sum;
 * @property bool $status;
 * @property string $name;
 * @property string $email;
 * @property string $phone;
 * @property string $address;
 * @property string $note;
 *
 * @package app\models
 */
class Order extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'orders';
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function rules(): array
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            ['note', 'string'],
            ['email', 'email'],
            [['created_at', 'updated_at'], 'safe'],
            ['qty', 'integer'],
            ['sum', 'number'],
            ['status', 'boolean'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адресс',
            'note' => 'Примечание',
        ];
    }
}
