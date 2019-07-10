<?php

namespace app\widgets\currency;

class Currency 
{
    protected $tpl;
    protected $currencies;
    protected $currency;

    public function __construct(){
        $this->tpl= __DIR__."/currency_tpl/currency_temlate1.php";
        $this->run();
    }

    protected function run() {
        $this->getHtml();
    }

    public static function getCurrencies() {

    } 

    public static function getCurrency() {

    } 

    protected function getHtml() {

    }

}

