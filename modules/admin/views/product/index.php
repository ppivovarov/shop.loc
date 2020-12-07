<?php

use yii\grid\ActionColumn;
use yii\grid\SerialColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="box-body">

                <div class="product-index">

                    <!--                    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => SerialColumn::class],

                            'id',
//                            'category_id',
                            [
                                'attribute' => 'category_id',
                                'value' => static function ($data) {
                                    return Html::a($data->category->title, ['category/index', 'id' => $data->category->id]);
                                },
                                'format' => 'raw',

                            ],
                            'title',
//                            'content',
                            'price',
                            //'old_price',
                            //'description:ntext',
                            //'keywords',
                            //'img',
//                            'is_offer',
                            [
                                'class' => ActionColumn::class,
                                'header' => 'Действия',
                            ],
                        ],
                    ]); ?>


                </div>


            </div>
        </div>
    </div>
</div>