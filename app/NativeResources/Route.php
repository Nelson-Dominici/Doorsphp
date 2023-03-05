<?php

namespace app\NativeResources;

use app\NativeResources\Request\Route\AbsoluteRoute;
use app\NativeResources\Request\Route\UriParamsRoute;
use app\NativeResources\Request\Route\Methods;

use app\NativeResources\Request\DataServices\ReqData;

class Route
{

	static private function check(string $route, array $func): void{
		
		$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

		$absoluteRoute = AbsoluteRoute::get($uri, $route);
		$uriParamsRoute = UriParamsRoute::get($uri, $route);

		if($absoluteRoute || $uriParamsRoute){
		
			$req = ReqData::get($route);

			if($uriParamsRoute){
				$req["uriParams"] = $uriParamsRoute;
			}

			[$class, $method] = $func;

			call_user_func(array($class, $method), $req);
			exit();
		}
	}

	public static function get(string $route, array $func): void{

		if ($_SERVER["REQUEST_METHOD"] === "GET") {
			self::check($route, $func);
		}
	}

	public static function post(string $route, array $func): void{
	
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			self::check($route, $func);
		}	
	}

	public static function put(string $route, array $func): void{
	
		if ($_SERVER["REQUEST_METHOD"] === "PUT") {
			self::check($route, $func);
		}		
	}

	public static function delete(string $route, array $func): void{
	
		if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
			self::check($route, $func);
		}			
	}
}