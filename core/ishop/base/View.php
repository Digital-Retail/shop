<?php

namespace ishop\base;

Class View
{
	public $route;
	public $controller;
	public $model;
	public $view;
	public $layout;
	public $data = [];
	public $meta = [];
	
	public function __construct($route, $layout, $view='', $meta='') {
		$this->route=$route;
		$this->controller=$route['controller'];
		$this->model=$route['controller'];
		$this->view=$view;
		$this->prefix=$route['prefix'];
		$this->meta=$meta;
		if($layout ===false) {
		$this->layout=false;
		}else{
		$this->layout=$layout ?: LAYOUT;
		}
	}
	
	public function render($data) {
		$viewFile = APP. "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
		if(is_array($data)) extract($data);
		//Получаем ВИД
		if(is_file($viewFile)) {
			ob_start();
			require_once($viewFile);
			$content = ob_get_clean();
		}else {
			throw new \Exception("Не найден вид {$viewFile} ",500);
		}
		//Получаем базовый шаблон
		if($this->layout !==false){
			$layoutFile = APP. "/views/layouts/{$this->layout}.php";
			
			if(is_file($layoutFile)) {
			    $metaData = $this->getMeta();
		    	require_once($layoutFile);
			}else{
				throw new \Exception("Не найден layout {$this->layout} по пути {$layoutFile} ",500);
			}

		}else{
			
		}
	}
	
	public function getMeta() {
	
    $metaData = "<title>{$this->meta['title']}</title>".PHP_EOL;
	$metaData .= "<meta http-equiv='Content-Type' content='text/html' charset=utf-8>".PHP_EOL;
	$metaData .="<meta name='description' content=\"{$this->meta['desc']}\">".PHP_EOL;
	$metaData .="<meta name='keywords' content=\"{$this->meta['keywords']}\">".PHP_EOL;
	return $metaData;
	}
}