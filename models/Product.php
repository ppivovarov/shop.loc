<?php
namespace app\models;

use yii\db\{ActiveQuery, ActiveRecord};

/**
 * Class Product
 * @property $id
 * @property $category_id
 * @property $title
 * @property $content
 * @property $price
 * @property $old_price
 * @property $description
 * @property $keywords
 * @property $img
 * @property $is_offer
 *
 * @package app\models
 */
class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @return ActiveQuery|Category|false
     */
    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}