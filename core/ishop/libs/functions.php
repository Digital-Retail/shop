<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}
function getskidka($price, $old_price) {
   return round((($price-$old_price)/$price)*100);

}