<?php

namespace app\NativeFeatures\Route;
use app\NativeFeatures\Request\ReqData;

class CallFunc
{
	public static function call(){
		
		$httpMethod = $_SERVER["REQUEST_METHOD"];
		$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

		$route = GetRoute::get($httpMethod, $uri);
		$func = GetFunc::get($route["funcPath"]);

		$reqData = ReqData::get($route, $httpMethod);
		
		call_user_func(array($func["controller"], $func["method"]), $reqData);
		
		exit();
	}
}