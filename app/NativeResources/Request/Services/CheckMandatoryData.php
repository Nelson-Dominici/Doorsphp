<?php

namespace app\NativeResources\Request\Services;
use app\NativeResources\Utils\MandatoryDataMSG;

class CheckMandatoryData
{

	public static function MandatoryDataMSG($data, $status){

		header("Content-Type: application/json; charset=utf-8");
		
		http_response_code($status);

		$json = [
			"message" => $data
		];

		echo json_encode($json);
		exit();
	}


	public static function check ($data, $mandatoryData){

		$keys = array_keys($data);

		$result = array_diff($mandatoryData, $keys);

		if($result !== []){
			self::MandatoryDataMSG(reset($result)." is required", 404);
		}

		$emptyKey = array_search("", $data);

		if($emptyKey){
			self::MandatoryDataMSG(reset($result)." is required", 404);

		}
	}
}