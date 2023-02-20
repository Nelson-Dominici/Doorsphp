<?php

namespace app\NativeFeatures\Request\Services;
use app\NativeFeatures\Utils\MandatoryDataMSG;

class CheckMandatoryData
{

	public static function MandatoryDataMSG($data, $status){

		header("Content-Type: application/json; charset=utf-8");
		
		http_response_code($status);

		$json = [
			"status" => $status,
			"data" => $data
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