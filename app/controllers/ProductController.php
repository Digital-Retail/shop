<?php


namespace app\controllers;


use app\models\BreadCrumbs;
use app\models\Product;
use \RedBeanPHP\R as R;

class ProductController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $product = R::findOne('product', 'alias=? And status ="1"', [$alias]);
        if (!empty($product)) {
            $this->setMeta($product->title ,$product->description, $product->keywords );

        } else {
            throw new \Exception("Контролер  не найден ", 404);
        }

        // Хлебные крошки
        $breadCrumbs = BreadCrumbs::getBreadCrumbs($product->category_id, $product->title);

        //Связанные товары
        $related = R::getAll('SELECT *FROM related_product JOIN product 
                                    ON product.id = related_product.related_id
                                     where product_id = ? LIMIT 3', [$product->id]
);

        //Запись в куки Просмотренные товары
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);

        //Получение просмотренных товаров
        $recentlyViewed= null;
        $r_viewed = $p_model->getRecentlyViewed();
        if($r_viewed) {
            $recentlyViewed = R::find('product', 'id in ('. R::genSlots($r_viewed).') Limit 3', $r_viewed);
        }

        // Гаелерея
        $images = R::getAll('select * from gallery where product_id= ?',[$product->id]);

        //Модификации
        $mods = R::findAll('modification', 'product_id = ?', [$product->id]);


        $this->set(compact('product','related', 'images','recentlyViewed','breadCrumbs','mods'));
    }
}