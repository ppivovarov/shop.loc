<?php
/** @var array $category */
/** @var string $tab */

/** @var MenuWidget $this */

use app\components\MenuWidget;

?>

<option
        value="<?php echo $category['id'] ?>"
    <?php if ($category['id'] === $this->model->parent_id) : ?>
        selected
    <?php endif; ?>
    <?php if ($category['id'] === $this->model->id) : ?>
        disabled
    <?php endif; ?>
>
    <?php echo $tab . ' ' . $category['title'] ?>
</option>
<?php if (isset($category['children'])) : ?>
    <?php echo $this->getMenuHtml($category['children'], $tab . '-') ?>
<?php endif; ?>