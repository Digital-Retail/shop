<?php

namespace ishop;

class Router
{
	protected static $routes =[];
	protected static $route;
	
	public static function add($regexp, $route = []) {
		self::$routes[$regexp]=$route;
	}
	public static function getRoutes () {
		return self::$routes;
	}
	
	public static function dispatch($url) {
	   $url=self::removeQueryString($url);
		if(self::mathRoute($url)) {
			$controller = "\app\controllers\\".self::$route['prefix'].self::$route['controller'].
			"Controller";
			if(class_exists($controller)) {
				$controllerObject = new $controller(self::$route);
				$action = self::lowerCamelCase(self::$route['action'])."Action";
			
				// Если метод найден вызываем контролер и вьюшку
				if(method_exists($controllerObject, $action)) {
					$controllerObject->$action();
					$controllerObject->getView();
				}else {
					throw new \Exception("Метод $controller :: $action не найден", 404);
				}
			//Если класс не найден	
			}else {
				throw new \Exception("Контролер не найден", 404);
			}
			
		}else {
			throw new \Exception("Страница не найдена",404);
		}
	}
	public static function mathRoute($url) {
	foreach(self::$routes as $pattern=>$route) {
		if(preg_match("#{$pattern}#",$url,$matches)) {
			
			foreach($matches as $k=>$v) {
				if(is_string($k)) {
					$route[$k]=$v;	
				}
			}
				if(empty($route['action'])) { 
					$route['action']='index';
				}
				
				if(!isset($route['prefix'])) {
					$route['prefix']='';
				}else {
					$route['prefix'].="\\";
				}
			self:$route['controller'] = self::upperCamelCase($route['controller']);
			self::$route = $route;
			return true;
		}
	}
	return false;
	}

	public static function upperCamelCase($name) {
	$name =str_replace(' ','', ucwords(str_replace('-', ' ',$name)) );	
	return $name;
	}
	
	public static function lowerCamelCase($name) {
		return lcfirst(self::upperCamelCase($name));
	}
	
	protected static function removeQueryString($url) {
		if($url){
			$params = explode('&',$url, 2);
			if(strpos($params[0], '=') ===false) {
				return rtrim($params[0], '/');
			}else {
				return '';
			}
		}
	}

}
