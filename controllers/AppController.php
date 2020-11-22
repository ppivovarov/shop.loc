<?php
declare(strict_types=1);

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller
{

    public function beforeAction($action)
    {
        $this->view->title = Yii::$app->name;
        return parent::beforeAction($action);
    }

    /**
     * Sets meta data into view
     *
     * @param string|null $title
     * @param string|null $keywords
     * @param string|null $description
     */
    protected function setMeta(string $title = null, string $keywords = null, string $description= null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords ?: " "], 'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $description ?: " "], 'description');
    }

}