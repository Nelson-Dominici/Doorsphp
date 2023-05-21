<?php

namespace app\Framework\Modules\Route\Services;

class CallRouteFunc
{
	
	public static function call(array|callable $funcs, array $reqRes): void{

		[$req, $res] = $reqRes;
		$endFunc = array_pop($funcs);
		
		$middlewareData = [];

		foreach ($funcs as $func) {
			
			if(gettype($func) !== "array"){
			
				$middlewareData = $func($req, $res);

			}else{

				[$class, $method] = $func;
				$middlewareData = call_user_func(array($class, $method), $req, $res);
			}
		}

		if($middlewareData)
			$req->middlewareData = $middlewareData;

		if(gettype($endFunc) !== "array"){
			$endFunc($req, $res);
			return;
		}

		[$class, $method] = $endFunc;
		call_user_func(array($class, $method), $req, $res);

	}
}