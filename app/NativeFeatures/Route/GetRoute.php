<?php

namespace app\NativeFeatures\Route;

class GetRoute
{
	
	private static function getRoutes($httpMethod){

		$routes = require_once("app/AllRoutes.php");

		if(array_key_exists($httpMethod, $routes)){
			return [$routes["NOT-FOUND"] ,$routes[$httpMethod]];
		};

		return [$routes["NOT-FOUND"], ""];
	}

	public static function get($httpMethod, $uri){
	
		if(gettype($uri) !== "string"){
			$uri = "/";
		}
		
		[$notFoundFuncPath, $routes] = self::getRoutes($httpMethod);

		if(!$routes)
			return $notFoundFuncPath;

		$uriParamsRoute = Uri\UriParamsRoute::get($uri, $routes);
		$absoluteRoute = Uri\AbsoluteRoute::get($uri, $routes);

		if($absoluteRoute)
			return $absoluteRoute;

		if($uriParamsRoute)
			return $uriParamsRoute;
		
		return $notFoundFuncPath;
	}
}
