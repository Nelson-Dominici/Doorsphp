<?php

namespace app\NativeResources\Request\Route;

class UriParamsRoute
{

	public static function get($uri, $route){

		$uriParts = explode("/", $uri);
		array_shift($uriParts);
		
		$data = [];

		$routeParts = explode("/", $route);
		array_shift($routeParts);
		
		if(count($uriParts) === count($routeParts)){

			$paramsArray = array_filter($routeParts, function($field) {
				return strpos($field, ":") === 0;
			});

			if(!empty($paramsArray)){

				$noParamsArray = array_filter($routeParts, function($field) {
					return strpos($field, ":") !== 0;
				});

				$essentialPartsUri = array_map(function($key) use($uriParts){

					return $uriParts[$key];

				}, array_keys($noParamsArray));

				$essentialPartsUri = implode(', ', 
					array_intersect($noParamsArray, $essentialPartsUri)
				);

				$essentialPartsRoute = implode(', ', $noParamsArray);

				if($essentialPartsUri === $essentialPartsRoute){

					foreach ($paramsArray as $key => $value) {
						$uriParamKey = str_replace(":", "", $value);
						$data[$uriParamKey] = $uriParts[$key];
					}
				}
			}
		}

		if(!empty($data)){
			return $data;
		}

		return false;
	}
}