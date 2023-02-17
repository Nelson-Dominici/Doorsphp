<?php

namespace app\Route;

class GetFunc
{
	
	public static function get($funcPath){
			
		$parts = explode(":", $funcPath);
		$path = "app/Modules/".$parts[0]."/".$parts[1].".php";
		$controller = require_once($path);
		$method = $parts[2];

		return [
			"controller" => $controller,
			"method" => $method,
		];

	}
}