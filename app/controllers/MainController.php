<?php

namespace app\controllers;

use ishop\App;
use \RedBeanPHP\R as R;
use ishop\Cache;

class MainController extends AppController {

    public function indexAction() {

    
        //$cashe = Cache::instance();
        //$cashe->set('test', $names);
        //$data = $cashe->get('test');
        $brands = R::find('brand', 'LIMIT 3');
        $hits= R::find('product', "hit='1'and status='1' Limit 8");
          //  debug($hits);
        
        $this->set(compact('brands','hits'));
        
        $this->setMeta(App::$app->getProperty('shop_name'), "Мужские брендовые часы", "Электронные часы, кварцевые часы");
    }

}
