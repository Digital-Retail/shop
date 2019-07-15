<?php


namespace app\models;


use ishop\App;

class BreadCrumbs
{

     public static function getBreadCrumbs($category_id, $name=''){
        $cats = App::$app->getProperty('cats');
        $breadCrumbsArray= self::getParts($cats, $category_id);
        $breadCrumbs = "<li><a href=".PATH.">Главная</a></li>".PHP_EOL;

        if($breadCrumbsArray) {
            foreach ($breadCrumbsArray as $alias=>$title) {
                $breadCrumbs.="<li><a href='".PATH."/category/{$alias}'>$title</a></li>".PHP_EOL;
            }
        }

        if($name) {
            $breadCrumbs .= "<li>$name</li>".PHP_EOL;
        }

        return $breadCrumbs;
     }


     public static function getParts($cats, $id) {

         if(!$id) return false;
         $breadCrumbs = [];
         foreach ($cats as $k=>$v) {
             if(isset($cats[$id])) {
                 $breadCrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                 $id = $cats[$id]['parent_id'];
             }else break;
         }

         return array_reverse($breadCrumbs, true);
     }


}