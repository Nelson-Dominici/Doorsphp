<?php

namespace app\NativeFeatures\Route\Uri;

class AbsoluteRoute
{

	public static function get($uri, $routes){

		if(array_key_exists($uri, $routes)){
			return $routes[$uri];
		}

		return false;
	}

}