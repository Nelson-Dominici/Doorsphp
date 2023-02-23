<?php

namespace app\NativeResources\Route;

class GetFunc
{
	
	public static function get($funcPath){	

		$parts = explode("/", $funcPath);
		[$controller, $method] = explode(":", array_pop($parts));

		$path = implode("/", $parts)."/".$controller.".php";

		$controller = require_once($path);

		return [
			"controller" => $controller,
			"method" => $method,
		];
	}
}