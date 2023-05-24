<?php

namespace app\Framework\Modules\Route\Services\RouteTypes;

class UrlParamsRoute
{

	public static function get(string $uri, string $route): array|bool{

		$urlParts = explode("/", $uri);
		array_shift($urlParts);
		
		$routeParts = explode("/", $route);
		array_shift($routeParts);
		
		$urlParams = [];

		if(count($urlParts) === count($routeParts)){

			$urlParamsRoute = array_filter($routeParts, function($field) {
				return strpos($field, ":") === 0;
			});

			if(!empty($urlParamsRoute)){

				$noUrlParamsInRoute = array_filter($routeParts, function($field) {
					return strpos($field, ":") !== 0;
				});

				$noUrlParamsInUrl = array_map(function($key) use($urlParts){

					return $urlParts[$key];

				}, array_keys($noUrlParamsInRoute));

				$noUrlParamsInUrl = implode(', ', 
					array_intersect($noUrlParamsInRoute, $noUrlParamsInUrl)
				);

				$noUrlParamsInRoute = implode(', ', $noUrlParamsInRoute);

				if($noUrlParamsInUrl === $noUrlParamsInRoute){

					foreach ($urlParamsRoute as $key => $value) {
						
						if(!$urlParts[$key]){
							return false;
						}

						$urlParamKey = str_replace(":", "", $value);
						$urlParams[$urlParamKey] = $urlParts[$key];
					
					}
				}
			}
		}

		return $urlParams;
	}
}