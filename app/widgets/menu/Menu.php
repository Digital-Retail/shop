<?php


namespace app\widgets\menu;


use ishop\App;
use ishop\Cache;
use RedBeanPHP\R;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'main-menu';
    protected $table = 'category';
    protected $cashe = 3600;
    protected $casheKey = 'ishop_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options=[])
    {
        $this->tpl = __DIR__. '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }
    protected function getOptions($options) {
        foreach ($options as $k =>$v) {
            if(property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function run() {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->casheKey);
        if(!$this->menuHtml) {
            $this->data = App::$app->getProperty('cats');
         //   debug($this->data) ;
            if(!$this->data) {
                $cats = R::getAssoc("select * from {$this->table}");
            }
            $this->tree = $this->getTree();
            $this->menuHtml=$this->getMenuHtml($this->tree);
            if($this->cashe) {
                $cache->set($this->casheKey, $this->menuHtml, $this->cashe);
            }
        }
        $this->output();
    }
    protected  function output() {
        $attrs='';
        foreach ($this->attrs as $k=>$v) {
            $attrs.="$k='$v' ";
        }
        echo "<{$this->container} class='{$this->class}' {$attrs}> ";
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }
    protected function getTree() {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
           // debug($node);
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
              //  debug($data[$node['parent_id']]['childs'][$id]);
            }
        }
        return $tree;
    }

    protected  function getMenuHtml($tree, $tab='') {
        $str= '';
        foreach ($tree as $id=>$category) {
            $str.=$this->catToTemplate($category, $tab,$id);
        }
        return $str;
    }

    public function catToTemplate($category, $tab, $id) {
        ob_start();
            require $this->tpl;

        return ob_get_clean();
    }
}