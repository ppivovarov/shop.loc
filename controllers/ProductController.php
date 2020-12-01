<?php
namespace app\controllers;

use app\models\Product;
use yii\web\NotFoundHttpException;

class ProductController extends AppController
{
    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id): string
    {
        $product = Product::findOne($id);
        if ($product === null) {
            throw new NotFoundHttpException('Такого продукта нет...');
        }

        $this->setMeta($product->title . ' :: ' . \Yii::$app->name, $product->keywords, $product->description);
        return $this->render('view', compact('product'));
    }
}
