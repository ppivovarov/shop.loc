<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = 'Категория: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
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
                        'confirm' => 'Вы уверены что хотите удалить категорию "' . $model->title . '"?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <div class="box-body">

                <div class="category-view">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
//                            'parent_id',
                            [
                                'attribute' => 'parent_id',
                                'value' => isset($model->category->title)
                                    ? Html::a($model->category->title, Url::to(['view', 'id' => $model->category->id]))
                                    :  'Самостоятельная категория',
                                'format' => 'raw'
                            ],
                            'title',
                            'description:ntext',
                            'keywords',
                        ],
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
</div>


