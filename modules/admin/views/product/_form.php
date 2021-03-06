<?php

use app\components\MenuWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */

mihaildev\elfinder\Assets::noConflict($this);
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="category-category_id">Категория</label>
        <select id="category-category_id" class="form-control" name="Product[category_id]">
            <?php echo MenuWidget::widget([
                'tpl' => 'select_product',
                'model' => $model,
                'cache_time' => 0,
            ]) ?>
        </select>
    </div>


    <?php // $form->field($model, 'content')->textInput() ?>

    <?php

    //    echo $form->field($model, 'content')->widget(CKEditor::class,[
    //        'editorOptions' => [
    //            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
    //            'inline' => false, //по умолчанию false
    //        ],
    //    ]);

    echo $form->field($model, 'content')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [/* Some CKEditor Options */]),
    ]);

    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'old_price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'keywords')->textInput() ?>

    <?= $form->field($model, 'file')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showUpload' => false,
        ],
    ])
    //    $form->field($model, 'img')->textInput()
    ?>


    <?= $form->field($model, 'is_offer')->dropDownList(['Нет', 'Да']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
