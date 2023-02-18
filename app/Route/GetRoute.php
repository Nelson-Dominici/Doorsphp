<?php

namespace app\Route;

use app\Utils\AppException;

use app\Handle\Route\Uri\AbsoluteRoute;
use app\Handle\Route\Uri\UriParamsRoute;

class GetRoute
{
	
	private static function getRoutes($httpMethod){

		$routes = require_once("app/Route/Routes.php");

		if(array_key_exists($httpMethod, $routes)){
			return $routes[$httpMethod];
		};

		throw new AppException("Something Went Wrong", 500);
	}

	public static function get($uri, $httpMethod){

		$routes = self::getRoutes($httpMethod);

		$uriParamsRoute = UriParamsRoute::get($uri, $routes);
		$absoluteRoute = AbsoluteRoute::get($uri, $routes);

		if($absoluteRoute)
			return $absoluteRoute;

		if($uriParamsRoute)
			return $uriParamsRoute;
		
		throw new AppException("This Route don't exists", 404);
	}
}
