<?php
declare(strict_types=1);

namespace app\components;

use yii\base\Widget;
use yii\helpers\Url;

class AddToCartButtonWidget extends Widget
{
    public $id;

    public function init()
    {
        parent::init();
        $this->id = $this->id ?: null;
    }

    public function run()
    {
        return '<a href="'
            . Url::to(['cart/add', 'id' => $this->id])
            . '" data-id="' . $this->id . '" class="button add-to-cart">Add to card</a>';
    }
}