<?php

namespace app\NativeResources\Request;

class ReqData
{

	public static function get($route, $httpMethod){

		$data = [
			"queryParams" => Services\QueryParams::get()
		];

		if (array_key_exists("uriParams", $route)) {
			$data["uriParams"] = $route["uriParams"];
		}

		if($httpMethod !== "GET" && $httpMethod !== "HEADE"){
			$data["body"] = Services\ReqBody::get();

			if(array_key_exists("mandatoryData", $route)){
				Services\CheckMandatoryData::check(
					$data["body"], $route["mandatoryData"]
				);
			}
		}

		return $data;
	}
}