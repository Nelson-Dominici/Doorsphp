<?php

namespace app\NativeResources\Route\Uri;

class AbsoluteRoute
{

	public static function get($uri, $route){
			
		$routeParts = explode("/", $route);
		array_shift($routeParts);

		$paramsArray = array_filter($routeParts, function($field) {
			return strpos($field, ":") === 0;
		});

		if(empty($paramsArray) && $route === $uri){

			return true;
		}

		return false;
	}

}