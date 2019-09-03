<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}
function getskidka($price, $old_price) {
   return round((($price-$old_price)/$price)*100);
}

/**
 * @param bool $http
 */
function redirect($http = false) {
    if($http) {
        $redirect = $http;
    }else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit();
}
function getFormData($nameField) {
    if(isset($_SESSION['formData'][$nameField])) {
        echo htmlspecialchars($_SESSION['formData'][$nameField]);

    }
}