<?php


namespace app\controllers;


use app\models\BreadCrumbs;
use app\models\Category;
use ishop\App;
use ishop\libs\Pagination;
use RedBeanPHP\R;

class CategoryController  extends AppController
{
    public function viewAction()
    {

        $alias = $this->route['alias'];
        $catorogory = R::findOne('category', 'alias = ?', [$alias]);

        if(!$catorogory) {
            throw new \Exception("Category {$alias} not found", 404);
        }


        $breadcrumbs = BreadCrumbs::getBreadCrumbs($catorogory->id);
        //Получить все дочерние категории
        $cat_model = new Category();
        $ids = $cat_model->getIds($catorogory->id);
        $ids = !$ids ? $catorogory->id : $ids . $catorogory->id;

        $page = isset($_GET['page']) ?  (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');
      // echo $total = R::count('product', 'category_id in ($ids)');
        $total = R::count('product', "category_id IN ($ids)");
        $pagination = new Pagination($page,$perpage,$total);
        $start = $pagination->getStart();

        $products = R::find('product', "category_id in ($ids) LIMIT {$start}, {$perpage}");
        $this->set(compact('products', 'breadcrumbs','pagination'));

    }
}