<?php

namespace app\Framework\Modules\Route\Services;

class CallRouteFunc
{
	
	public static function call(array|callable $funcs, array $objects): void{

		[$req, $res] = $objects;
		$endFunc = array_pop($funcs);
		
		$middlewareData = [];

		foreach ($funcs as $func) {

			if(gettype($func) !== "array"){
			
				$data = $func($req, $res);

				if($data){
					$middlewareData = array_merge($middlewareData, $data);
				}

			}else{

				[$class, $method] = $func;
				$data = call_user_func(array($class, $method), $req, $res);
				
				if($data){
					$middlewareData = array_merge($middlewareData, $data);
				}

			}
		}

		if($middlewareData){

			foreach ($middlewareData as $key => $value) {
				$req->$key = $value;
			}
		};

		if(gettype($endFunc) !== "array"){
			$endFunc($req, $res);
			return;
		}

		[$class, $method] = $endFunc;
		call_user_func(array($class, $method), $req, $res);

	}

}