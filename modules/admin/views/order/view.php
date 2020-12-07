<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Заказ № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы уверены что хотите удалить заказ?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="box-body">
                <div class="order-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'created_at:datetime',
                            'updated_at:datetime',
                            'qty',
                            'sum',
                            [
                                'attribute' => 'status',
                                'value' => $model->status
                                    ? '<span class="text-green">Готов</span>'
                                    : '<span class="text-danger">Новый</span>',
                                'format' => 'raw',
                            ],
//                            'status',
                            'name',
                            'email',
                            'phone',
                            'address',
                            'note:ntext',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Товары в заказе</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                    </tr>
                    <?php foreach ($items = $model->orderProducts as $product) : ?>
                        <tr>
                            <td><?php echo $product->id ?></td>
                            <td><?php echo $product->title ?></td>
                            <td><?php echo $product->qty ?></td>
                            <td><?php echo $product->price ?></td>
                            <td><?php echo $product->total ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>