<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    public function actionView(int $id)
    {
        if (empty($category = Category::findOne($id))) {
            throw new NotFoundHttpException('Такой категории нет.....');
        }

        $this->setMeta($category->title . ' :: ' . \Yii::$app->name, $category->keywords, $category->description);

//        $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch($q)
    {
        $q = trim(\Yii::$app->request->get('q'));
        $this->setMeta($this->view->title = 'Search ' . $q . ' :: ' . \Yii::$app->name);
        if (!$q) {
            return $this->render('search');
        }

        $query = Product::find()->where(['like', 'title', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('search', compact('products', 'pages', 'q'));



    }

}