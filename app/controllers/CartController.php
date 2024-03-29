<?php


namespace app\controllers;


use app\models\Cart;
use RedBeanPHP\R;

class CartController extends  AppController
{
    public function addAction() {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;
        if($id) {
            $product = R::findOne('product', 'id = ?', [$id]);
            if(!$product) return false;

            if($mod_id) {
                $mod = R::findOne('modification', 'id=? AND product_id=?', [$mod_id, $id]);
            }

            $cart = new Cart();
            $cart->addToCart($product, $qty, $mod );
            if($this->isAjax()) {
                $this->loadView('Cart_modal');
            }
            redirect();
            exit();
        }

    }

    public function showAction() {
        if($this->isAjax()) {
            $this->loadView('Cart_modal');
        }
        redirect();
        exit();
    }

    public function deleteAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;

        if(isset($_SESSION['cart'][$id])) {
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if($this->isAjax()) {
            $this->loadView('Cart_modal');
        }
        redirect();
        exit();
    }
    public function destroyAction() {
        if(isset($_SESSION['cart'])) {
            $cart = new Cart();
            $cart->deleteCart();
        }
        if($this->isAjax()) {
            $this->loadView('Cart_modal');
        }
        redirect();
        exit();

    }
}