<?php
namespace app\components;

use app\models\Category;
use Yii;

class MenuWidget extends \yii\base\Widget
{
    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        $this->tpl = ($this->tpl ?: 'menu') . '.php';
        $this->ul_class = $this->ul_class ?: 'menu';
    }

    public function run()
    {
        //get cache
        if ($menu = Yii::$app->cache->get('menuHtml')) {
            return $menu;
        }

        $this->data = Category::find()
            ->select('id, parent_id, title')
            ->indexBy('id')
            ->asArray()
            ->all();
        $this->tree = $this->getTree();
        $this->menuHtml = ('<ul class="' . $this->ul_class . '">' . $this->getMenuHtml($this->tree) . '</ul>');

        Yii::$app->cache->set('menuHtml', $this->menuHtml, 60);
        return $this->menuHtml;
    }
    
    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$datum) {

            if (!$datum['parent_id']) {
                $tree[$id] = &$datum;
            } else {
                $this->data[$datum['parent_id']]['children'][$datum['id']] = &$datum;
            }
        }
        return $tree;
    }

    protected function getMenuHtml(array $tree)
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate(array $category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }


}