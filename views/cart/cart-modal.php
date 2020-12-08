<?php /** @var array $session */

use yii\helpers\Html;

if (!empty($cart = $session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $id => $product) : ?>
                <tr>
                    <td>
                        <?php echo Html::img('@web/products/' . ($product['img'] ?: 'no-image.png'), ['alt' => $product['title'],]) ?>
                    </td>
                    <td><?php echo $product['title'] ?></td>
                    <td><?php echo $product['qty'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td>
                        <span data-id="<?php echo $id ?>" class="glyphicon glyphicon-remove text-danger del-item"
                              aria-hidden="true"></span>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Итого:</td>
                <td id="cart-qty"><?php echo $session['cart.qty'] ?></td>
            </tr>
            <tr>
                <td colspan="4">На сумму:</td>
                <td id="cart-sum">$<?php echo $session['cart.sum'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
