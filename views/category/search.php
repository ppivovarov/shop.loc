<?php
/** @var Category $category */

/** @var Pagination $pages */

use app\components\AddToCartButtonWidget;
use app\models\Category;
use yii\helpers\{Html, Url};
use yii\data\Pagination;
use yii\widgets\LinkPager;

?>
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li>
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="<?php echo Url::home() ?>">Home</a>
                <span>|</span>
            </li>
            <li>Search</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
    <?php echo $this->render('//layouts/inc/sidebar') ?>
    <div class="w3l_banner_nav_right">
        <div class="w3l_banner_nav_right_banner3">
            <h3>Best Deals For New Products<span class="blink_me"></span></h3>
        </div>
        <div class="w3l_banner_nav_right_banner3_btm">
            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                <div class="view view-tenth">
                    <img src="images/13.jpg" alt=" " class="img-responsive"/>
                    <div class="mask">
                        <h4>Grocery Store</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                    </div>
                </div>
                <h4>Utensils</h4>
                <ol>
                    <li>sunt in culpa qui officia</li>
                    <li>commodo consequat</li>
                    <li>sed do eiusmod tempor incididunt</li>
                </ol>
            </div>
            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                <div class="view view-tenth">
                    <img src="images/14.jpg" alt=" " class="img-responsive"/>
                    <div class="mask">
                        <h4>Grocery Store</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                    </div>
                </div>
                <h4>Hair Care</h4>
                <ol>
                    <li>enim ipsam voluptatem officia</li>
                    <li>tempora incidunt ut labore et</li>
                    <li>vel eum iure reprehenderit</li>
                </ol>
            </div>
            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                <div class="view view-tenth">
                    <img src="images/15.jpg" alt=" " class="img-responsive"/>
                    <div class="mask">
                        <h4>Grocery Store</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                    </div>
                </div>
                <h4>Cookies</h4>
                <ol>
                    <li>dolorem eum fugiat voluptas</li>
                    <li>ut aliquid ex ea commodi</li>
                    <li>magnam aliquam quaerat</li>
                </ol>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="w3ls_w3l_banner_nav_right_grid">
            <h3>Поиск: "<?php echo Html::encode($q) ?>"</h3>
            <?php if (!empty($products)) : ?>
                <div class="w3ls_w3l_banner_nav_right_grid1">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-md-3 w3ls_w3l_banner_left">
                            <div class="hover14 column">
                                <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                                    <?php if ($product->is_offer): ?>
                                        <div class="agile_top_brand_left_grid_pos">
                                            <?php echo Html::img(
                                                '@web/images/offer.png',
                                                ['alt' => 'offer', 'class' => 'img-responsive'])
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block">
                                                <div class="snipcart-thumb">
                                                    <a href="<?php echo Url::to(['product/view', 'id' => $product->id]) ?>">
                                                        <?php echo Html::img(
                                                            '@web/' . $product->img,
                                                            ['alt' => $product->title]
                                                        ) ?>
                                                    </a>
                                                    <p><?php echo $product->title ?></p>
                                                    <h4><?php echo $product->price ?>
                                                        <?php if ((float)$product->old_price): ?>
                                                            <span>$<?php echo $product->old_price; ?></span>
                                                        <?php endif; ?>
                                                    </h4>
                                                </div>
                                                <div class="snipcart-details">
                                                    <?php echo AddToCartButtonWidget::widget(['id' => $product->id]) ?>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                    <?php echo LinkPager::widget([
                        'pagination' => $pages,
                        'nextPageCssClass' => 'next test',
                        'nextPageLabel' => 'next',
                        'prevPageLabel' => 'prev',
//                        'maxButtonCount' => 4
                    ]) ?>
                </div>
            <?php else: ?>
                <div class="w31s_w31_banner_nav_right_grid1">
                    <h6>Ничего не найдено</h6>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->