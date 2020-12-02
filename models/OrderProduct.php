<?php
declare(strict_types=1);

namespace app\models;

use yii\db\{ActiveRecord};

/**
 * Class OrderProduct
 *
 * @property int $id;
 * @property int $order_id;
 * @property int $product_id;
 * @property string $title;
 * @property float $price;
 * @property int $qty;
 * @property float $total;
 *
 * @package app\models
 */
class OrderProduct extends ActiveRecord
{


    public function rules(): array
    {
        return [
            [['order_id', 'product_id', 'title', 'price', 'qty', 'total'], 'required'],
            [['order_id', 'product_id', 'qty'], 'integer'],
            [['price', 'total'], 'number'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'order_id' => 'Ид заказа',
            'product_id' => 'Ид продукта',
            'title' => 'Название продукта',
            'price' => 'Цена продукта',
            'qty' => 'Количество продукта',
            'total' => 'Сумма за все продукты'
        ];
    }

    public function saveOrderProduct(array $products, int $order_id): bool
    {
        foreach ($products as $id => $product) {
            unset($this->id);
            $this->setIsNewRecord(true);
            $this->order_id = $order_id;
            $this->product_id = $id;
            $this->title = $product['title'];
            $this->price = $product['price'];
            $this->qty = $product['qty'];
            $this->total = $product['qty'] * $product['price'];
            $res = $this->save();
            if (!$res) {
                return false;
            }
        }
        return true;
    }
}
