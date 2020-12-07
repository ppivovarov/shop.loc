<?php
declare(strict_types=1);

namespace app\modules\admin\models;

use yii\db\{ActiveQuery, ActiveRecord};

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['parent_id'], 'default', 'value' => null],
            [['parent_id'], 'integer'],
            [['title', 'description', 'keywords'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'title' => 'Наименование',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory(): ActiveQuery
    {
//        return $this->hasOne(__CLASS__, ['id' => 'category_id']);
        return $this->hasOne(Category::class, ['id' => 'parent_id']);

    }
}
