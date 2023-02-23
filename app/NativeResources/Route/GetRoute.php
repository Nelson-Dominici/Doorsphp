<?php

namespace app\NativeResources\Route;

use app\NativeResources\Route\Uri\UriParamsRoute;
use app\NativeResources\Route\Uri\AbsoluteRoute;

class GetRoute
{
	
	private static function getRoutes($httpMethod){

		$routes = require_once("app/AllRoutes.php");

		if(array_key_exists($httpMethod, $routes)){
			return [$routes["NOT-FOUND"], $routes[$httpMethod]];
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

		foreach ($routes as $route => $routeInfos) {
			
			$absoluteRoute = AbsoluteRoute::get($uri, $route);

			if($absoluteRoute){
				return $routeInfos;
			}

			$uriParamsRoute = UriParamsRoute::get($uri, $route);

			if($uriParamsRoute){
				$routeInfos["uriParams"] = $uriParamsRoute;
				return $routeInfos;
			}
		}

		return $notFoundFuncPath;
	}
}