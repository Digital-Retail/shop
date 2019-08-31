<?php


namespace app\models;


use ishop\App;

class Category extends AppModel
{
    public function getIds($id) {
        $ids= null;
        $cats = App::$app->getProperty('cats');

        foreach ($cats as $k => $v) {
            if($v['parent_id']==$id) {
                $ids.=$k.',';
                $ids.=$this->getIds($k);
            }
        }
        return $ids;
    }
}