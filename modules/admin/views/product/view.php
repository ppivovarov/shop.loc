<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

use yii\helpers\{Html, Url};
use yii\web\YiiAsset;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить товар', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Вы уверены что хотите удалить этот товар?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="box-body">

                <div class="product-view">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
//                            'category_id',
                            [
                                'attribute' => 'category_id',
//                                'value' => $model->category->title,
                                'value' => Html::a($model->category->title, [Url::to(['category/view', 'id' => $model->category_id])]),
                                'format' => 'raw',

                            ],
                            'title',
                            'content:raw',
                            'price',
                            'old_price',
                            'description:ntext',
                            'keywords',
//                            'img',
                            [
                                'attribute' => 'img',
                                'value' => '/' . $model->img,
                                'format' => ['image', ['width' => '50px']],
                            ],
//                            'is_offer',
                            [
                                'attribute' => 'is_offer',
                                'value' => $model->is_offer ? 'Да' : 'Нет',
                            ],
                        ],
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
</div>