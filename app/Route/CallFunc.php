<?php

namespace app\Route;

use app\Handle\Request\Check\CheckMandatoryData;
use app\Handle\Request\ReqBody;
use app\Handle\Route\Uri\QueryParams;
use app\Utils\AppException;

class CallFunc
{
	public static function call(){
	
		$httpMethod = $_SERVER["REQUEST_METHOD"];
		$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		if(gettype($uri) !== "string"){
			throw new AppException("Something Went Wrong", 500);
		}

		$route = GetRoute::get($uri, $httpMethod);
		$func = GetFunc::get($route["funcPath"]);

		$req["queryParams"] = QueryParams::get();
		$req["uriParams"] = [];
		$req["body"] = [];

		if (array_key_exists("uriParams", $route)) {
			$req["uriParams"] = $route["uriParams"];
		}

		if($httpMethod !== "GET" && $httpMethod !== "HEADE"){

			$req["body"] = ReqBody::get();

			if(array_key_exists(0, $route)){
				CheckMandatoryData::check($req["body"], $route[0]);
			}
		}

		call_user_func(array($func["controller"], $func["method"]), $req);
		
		exit();
	}
}