<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $title
 * @property string|null $content
 * @property float|null $price
 * @property float|null $old_price
 * @property string|null $description
 * @property string|null $keywords
 * @property string|null $img
 * @property int|null $is_offer
 *
 * @property OrderProduct[] $orderProducts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'is_offer'], 'default', 'value' => null],
            [['category_id', 'is_offer'], 'integer'],
            [['title', 'content', 'description', 'keywords', 'img'], 'string'],
            [['price', 'old_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'content' => 'Content',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'img' => 'Img',
            'is_offer' => 'Is Offer',
        ];
    }

//    /**
//     * Gets query for [[OrderProducts]].
//     *
//     * @return \yii\db\ActiveQuery
//     */
//    public function getOrderProducts()
//    {
//        return $this->hasMany(OrderProduct::className(), ['product_id' => 'id']);
//    }
}
