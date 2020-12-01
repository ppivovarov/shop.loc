<?php

namespace app\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'products';
    }

    public function rules(): array
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            ['note', 'string'],
            ['email', 'email'],
            [['created_at', 'updated_at'], 'safe'],
            ['qty', 'integer'],
            ['total', 'number'],
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
