<?php
declare(strict_types = 1);

namespace app\models;

use yii\base\Model;

class Cart extends Model
{
    public function addToCart(Product $product, int $qty = 1): void
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

    public function recalc(int $id): bool
    {
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }
        $cartProduct = $_SESSION['cart'][$id];
        $qtyMinus = $cartProduct['qty'];
        $sumMinus = $cartProduct['qty'] * $cartProduct['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
        return true;
    }
}
