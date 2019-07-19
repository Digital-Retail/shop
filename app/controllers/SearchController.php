<?php


namespace app\controllers;


use RedBeanPHP\R;

class SearchController extends AppController
{
 public function  typeaheadAction() {
     if($this->isAjax()) {
         $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
         if($query) {
             $product = R::getAll('Select id, title FROM product where title Like ? Limit 9', ["%{$query}%"]);
            echo json_encode($product);
         }
     }
     die;
 }

    public function  indexAction() {
        $s = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if($s) {
         $product = R::find('product', 'title Like ?', ["%{$s}%"]);
        }
        $this->set(compact('product'));
    }
}