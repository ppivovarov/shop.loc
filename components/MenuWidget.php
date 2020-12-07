<?php
declare(strict_types=1);

namespace app\components;

use app\models\Category;
use Yii;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;
    public $model;
    public $cache_time = 60;

    public function init()
    {
        parent::init();
        $this->tpl = ($this->tpl ?: 'menu') . '.php';
        $this->ul_class = $this->ul_class ?: 'menu';
    }

    public function run()
    {
        //get cache
        if ($this->cache_time && $menu = Yii::$app->cache->get('menuHtml')) {
            return $menu;
        }

        $this->data = Category::find()
            ->select('id, parent_id, title')
            ->indexBy('id')
            ->asArray()
            ->all();
        $this->tree = $this->getTree();
        $this->menuHtml = ('<ul class="' . $this->ul_class . '">' . $this->getMenuHtml($this->tree) . '</ul>');

        //set cache
        if ($this->cache_time) {
            Yii::$app->cache->set('menuHtml', $this->menuHtml, $this->cache_time);
        }
        return $this->menuHtml;
    }
    
    protected function getTree(): array
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

    /**
     * @param array $tree
     * @param string $tab
     * @return string
     */
    protected function getMenuHtml(array $tree, string $tab = ''): string
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category, $tab);
        }
        return $str;
    }

    /**
     * Returns rendered template
     *
     * @param array $category
     * @param string $tab
     * @return string
     */
    protected function catToTemplate(array $category, $tab): string
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }


}