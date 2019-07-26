<?php


namespace app\controllers;


class CategoryController  extends AppController
{
 public function viewAction() {
     debug($this->route);
     $alias = $this->route['alias'];
     debug($alias);
     die;
 }
}