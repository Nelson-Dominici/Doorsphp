<?php

namespace app\Modules\Route\Services\RouteTypes;

class AbsoluteRoute
{

	public static function get(string $uri, string $route): string|bool{
			
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