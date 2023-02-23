<?php

namespace app\NativeResources\Request\Services;

class QueryParams
{

	public static function get(){

		if(!empty($_SERVER['QUERY_STRING'])){

			$query = $_SERVER['QUERY_STRING'];

			$queryParams = []; 
			
			foreach(explode("&", $query) as $param) {
				
				$keyValue = explode("=", $param);

				if (array_key_exists(1, $keyValue)) {
					$queryParams["$keyValue[0]"] = "$keyValue[1]";

				} else {
					$queryParams["$keyValue[0]"] = "";
				}
			}

			return $queryParams;
		
		};

		return [];
	}

}