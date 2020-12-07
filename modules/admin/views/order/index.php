<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\{SerialColumn, ActionColumn};
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Список заказов';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="box-body">
                <div class="order-index">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => SerialColumn::class],
                            'id',
                            [
                                'attribute' => 'created_at',
                                'format' => ['datetime', 'php:d M Y H:i:s'],
//                                'format' => 'date'
//                                'format' => 'datetime'
                            ],
                            'updated_at',
                            'qty',
                            'sum',
                            'status',
                            [
                                'attribute' => 'status',
                                'value' => static function ($data) {
                                    return $data->status
                                        ? '<span class="text-green">Готов</span>'
                                        : '<span class="text-danger">Новый</span>';
                                },
//                                'value' => static fn($data) => $data->status ?
//                                    '<span class="text-green">Готов</span>' : '<span class="text-danger">Новый</span>',
                                'format' => 'raw',
                            ],
                            //'name',
                            //'email:email',
                            //'phone',
                            //'address',
                            //'note:ntext',
                            [
                                'class' => ActionColumn::class,
                                'header' => 'Действия',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>


