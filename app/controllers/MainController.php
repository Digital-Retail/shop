<?php

namespace app\controllers;

use ishop\App;
use \RedBeanPHP\R as R;
use ishop\Cache;

class MainController extends AppController {

    public function indexAction() {

        $posts = R::findAll('test');
        $name = "kirill";
        $age = 19;
        $login = "ok";
        $names = ['dfssd', 'sdfsdf', 'Mike'];
        $cashe = Cache::instance();
        $cashe->set('test', $names);
        $data = $cashe->get('test');
        $this->set(compact('name', 'age', 'login', 'posts'));
        
        $this->setMeta(App::$app->getProperty('shop_name'), "Мужские брендовые часы", "Электронные часы, кварцевые часы");
    }

}
