<?php
declare(strict_types = 1);

namespace app\models;

use yii\base\Model;

class Cart extends Model
{
    public function addToCart(Product $product, int $qty = 1)
    {
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += 1;
        } else {
            $_SESSION['cart'][$product->id] = [
                'title' => $product->title,
                'price' => $product->price,
                'img' => $product->img,
                'qty' => $qty,
            ];
        }

        $qK = 'cart.qty';
        $sK = 'cart.sum';
        $pS = $qty * $product->price;
        $_SESSION[$qK] = isset($_SESSION[$qK]) ? $_SESSION[$qK] + $qty : $qty;
        $_SESSION[$sK] = isset($_SESSION[$sK]) ? $_SESSION[$sK] + $pS : $pS;
    }
}
