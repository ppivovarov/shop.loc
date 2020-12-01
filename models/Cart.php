<?php
declare(strict_types=1);

namespace app\models;

use yii\base\Model;

class Cart extends Model
{

    /**
     * Adds or remove the number of products of the cart
     *
     * @param Product $product
     * @param int $qty
     */
    public function addToCart(Product $product, int $qty = 1): void
    {
        $qty = $qty === -1 ? -1 : 1;
        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
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
        if ($_SESSION['cart'][$product->id]['qty'] === 0) {
            unset($_SESSION['cart'][$product->id]);
        }
    }

    /**
     * Recalculates sum, quantity in the cart and removes product in the cart
     *
     * @param int $id
     * @return bool
     */
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
