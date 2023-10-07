<?php

namespace app\Framework\Modules\Route\Services\RouteTypes;

class AbsoluteRoute
{
	public static function check(string $uri, string $routePath): string|bool
	{		
		$routeParts = explode("/", $routePath);
		array_shift($routeParts);

		$paramsArray = array_filter($routeParts, function($field) {
			return strpos($field, ":") === 0;
		});

		if (empty($paramsArray) && $routePath === $uri){ 

			return true;
		}

		return false;
	}
}