<?php

namespace app\NativeResources\Request\DataServices;

class ReqData
{

	public static function get($route){

		$httpMethod = $_SERVER["REQUEST_METHOD"];

		$data = [
			"queryParams" => QueryParams::get()
		];

		if($httpMethod !== "GET" && $httpMethod !== "DELETE"){
			$data["body"] = ReqBody::get();
		}

		return $data;
	}
}