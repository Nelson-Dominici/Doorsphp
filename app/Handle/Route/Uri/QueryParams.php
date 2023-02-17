<?php

namespace app\Handle\Route\Uri;

class QueryParams
{

	public static function get(){

		if(!empty($_SERVER['QUERY_STRING'])){

			$query = $_SERVER['QUERY_STRING'];

			$queryParams = []; 
			
			foreach(explode("&", $query) as $param) {
				
				$keyValue = explode("=", $param);
				$queryParams["$keyValue[0]"] = "$keyValue[1]";
			}

			return $queryParams;
		
		};

		return "";
	}

}