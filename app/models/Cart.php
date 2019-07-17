<?php


namespace app\models;


use ishop\App;

class Cart extends AppModel
{
    public function addToCart($product = 1, $qty = 1, $mod = null) {
       if(!isset($_SESSION['cart.currency'])) {
           $_SESSION['cart.currency'] = App::$app->getProperty('currency');
       }
       if($mod) {
           $ID = "{$product->id}-{$mod->id}";
           $title = "{$product->title} ({$mod->title})";
           $price = $mod->price;
       } else {
           $ID = $product->id;
           $title = $product->title;
           $price = $product->price;
       }
       if(isset($_SESSION['cart'][$ID])) {
           $_SESSION['cart'][$ID]['qty'] += (int)$qty;
       }else {
           $_SESSION['cart'][$ID] = [
              'id' =>$ID,
              'qty' => $qty,
              'title' =>$title,
              'alias' =>$product->alias,
              'price'=>$price*$_SESSION['cart.currency']['value'],
              'img' =>$product->img

           ];
           $priceOne=$price*$_SESSION['cart.currency']['value']*$price;
           $qty= (int)$qty;

         //  $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + ($priceOne * (int)$qty) : $priceOne * $qty;

       }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? (int)$_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * ($price * $_SESSION['cart.currency']['value']) : $qty * ($price * $_SESSION['cart.currency']['value']);
    }
    public function deleteItem($id) {
        $minusQty = $_SESSION['cart'][$id]['qty'];
        $minusSum = $minusQty *$_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -=$minusQty;
        $_SESSION['cart.sum'] -= $minusSum ;
        unset($_SESSION['cart'][$id]);

    }
    public function deleteCart() {
        unset($_SESSION['cart']);
        unset( $_SESSION['cart.qty'] );
        unset(  $_SESSION['cart.qty'] );
        unset(  $_SESSION['cart.currency'] );
    }

}