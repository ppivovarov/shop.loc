<?php

use yii\helpers\Url;

$isParent = isset($category['children']);
?>
<li <?php if ($isParent) echo 'class="dropdown"'; ?>>
    <a
            href="<?php echo Url::to(['category/view', 'id' => $category['id']]) ?>"
        <?php if ($isParent) echo 'class="dropdown-toggle" data-toggle="dropdown"'; ?>
    >
        <?php echo $category['title'] ?>
    </a>
    <?php if ($isParent) : ?>
        <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
            <div class="w3ls_vegetables">
                <ul>
                    <?php echo $this->getMenuHtml($category['children'])?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</li>