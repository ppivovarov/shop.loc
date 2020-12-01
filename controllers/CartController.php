<?php
declare(strict_types=1);

namespace app\controllers;

use app\models\{Cart, Product};
use Yii;
use yii\web\Response;

class CartController extends AppController
{
    /**
     * Adds one item to the cart
     *
     * @param $id
     * @return bool|string|Response
     */
    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if ($product === null) {
            return false;
        }

        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(Yii::$app->request->referrer);

    }

    /**
     * Shows modal-cart
     *
     * @return string
     */
    public function actionShow(): string
    {
        $session = Yii::$app->session;
        $session->open();
        return $this->renderPartial('cart-modal', compact('session'));
    }

    /**
     * Removes one product from the cart
     *
     * @return string|Response
     */
    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc((int)$id);
        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Removes all products form the cart
     *
     * @return string
     */
    public function actionClear(): string
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderPartial('cart-modal', compact('session'));
    }

    /**
     * Shows checkout page
     *
     * @return string
     */
    public function actionCheckout(): string
    {
        $session = Yii::$app->session;
        $session->open();
        $this->setMeta('Оформление заказа :: ' . Yii::$app->name);
        return $this->render('checkout', compact('session'));
    }

    /**
     * Changes quantity products in the cart
     *
     * @param string|null $id
     * @param string|null $qty
     * @return bool
     */
    public function actionChangeCart(string $id = null, string $qty = null): bool
    {
        $product = Product::findOne($id);
        if ($product === null || empty($qty)) {
            return false;
        }
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, (int)$qty);
        return true;
    }
}
