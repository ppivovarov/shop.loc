<?php
declare(strict_types=1);

namespace app\controllers;

use app\models\{Cart, Order, OrderProduct, Product};
use Yii;
use yii\base\ErrorException;
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
     */
    public function actionCheckout()
    {
        $this->setMeta('Оформление заказа :: ' . Yii::$app->name);
        $session = Yii::$app->session;
        $order = new Order();
        $orderProduct = new OrderProduct();
        if ($order->load(Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            $transaction = Yii::$app->getDb()->beginTransaction();

            try {
                if (null === $transaction) {
                    throw new ErrorException('При сохранении заказа не удалось запустить транзакцию');
                }

                if (!$order->save() || !$orderProduct->saveOrderProduct($session['cart'], $order->id)) {
                    Yii::$app->session->setFlash('error', 'Ошибка при оформлении заказа');
                    $errors = '';
                    define('BR', '</br>');

                    foreach ($order->getErrors() as $error) {
                        $errors .= implode(BR, $error) . BR;
                    }
                    foreach ($orderProduct->getErrors() as $error) {
                        $errors .= implode(BR, $error) . BR;
                    }

                    $transaction->rollBack();
                    throw new ErrorException('Ошибки при оформлении заказа: ' . BR . $errors);
                }

                $transaction->commit();
                Yii::$app->session->setFlash('success', 'Ваш заказ принят');
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();

            } catch (\Throwable $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
                $transaction->rollBack();
            }
        }

        return $this->render('checkout', compact('session', 'order'));
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
