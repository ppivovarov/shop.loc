<?php
/** @var View $this */
/** @var int $orders */
/** @var int $categories */
/** @var int $products */

use yii\helpers\Url;
use yii\web\View;

$this->params['breadcrumbs'][] = $this->title = 'Статистика магазина';
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo $orders ?></h3>
                <p>Заказов</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="<?php echo Url::to(['order/index'])?>" class="small-box-footer" target="_blank">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?php echo $products ?></h3>
                <p>Товаров</p>
            </div>
            <div class="icon">
                <i class="fa fa-cutlery"></i>
            </div>
            <a href="<?php echo Url::to(['product/index'])?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $categories ?></h3>
                <p>Категорий</p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
            <a href="<?php echo Url::to(['category/index'])?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


</div>
