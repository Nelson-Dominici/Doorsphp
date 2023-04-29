<?php

namespace app\Framework\Modules\Route\Services\Request\ReqData;

class QueryParams
{

	public static function get(): array{

		$queryParams = []; 
		
		if(!empty($_SERVER["QUERY_STRING"])){

			$query = $_SERVER["QUERY_STRING"];
			
			foreach(explode("&", $query) as $field) {
				
				$key_value = explode("=", $field);

				if(array_key_exists(1, $key_value)) {
					$queryParams["$key_value[0]"] = "$key_value[1]";

				}else {
					$queryParams["$key_value[0]"] = "";
				}
			}
		};
		
		return $queryParams;
	}

}