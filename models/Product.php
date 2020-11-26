<?php
namespace app\models;

use yii\db\{ActiveQuery, ActiveRecord};

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