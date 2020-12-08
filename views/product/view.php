<?php

use app\components\AddToCartButtonWidget;
use app\models\Product;
use yii\helpers\{Html, Url};

/** @var Product $product */
?>
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li>
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="<?php echo Url::home() ?>">Home</a>
                <span>|</span>
            </li>
            <!--            <li>-->
            <!--                <a href="-->
            <?php //echo Url::to(['category/view', 'id' => $product->category->id])?><!--">-->
            <!--                    --><?php //echo $product->category->title ?>
            <!--                </a>-->
            <!--                <span>|</span>-->
            <!--            </li>-->
            <li>
                <?php echo Html::a(
                    $product->category->title,
                    ['category/view', 'id' => $product->category->id]
                ) ?>
                <span>|</span>
            </li>
            <li><?php echo $product->title ?></li>
        </ul>
    </div>
</div>
<div class="banner">
    <?php echo $this->render('//layouts/inc/sidebar') ?>
    <div class="w3l_banner_nav_right">
        <div class="w3l_banner_nav_right_banner3">
            <h3>Best Deals For New Products<span class="blink_me"></span></h3>
        </div>
        <div class="agileinfo_single">
            <h5><?php $product->title ?></h5>
            <div class="col-md-4 agileinfo_single_left">
                <?php echo Html::img(
                    '@web/' . $product->img,
                    ['title' => $product->title, 'id' => 'example']
                ) ?>
            </div>
            <div class="col-md-8 agileinfo_single_right">
                <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
                </div>
                <div class="w3agile_description">
                    <h4>Description :</h4>
                    <p><?php echo $product->content; ?></p>
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">
                        <h4><?php echo $product->price ?>
                            <?php if ((float)$product->old_price): ?>
                                <span>$<?php echo $product->old_price; ?></span>
                            <?php endif; ?>
                        </h4>
                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
                        <?php echo AddToCartButtonWidget::widget(['id' => $product->id]) ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
    <div class="clearfix"></div>
</div>



