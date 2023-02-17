<?php

namespace app\Handle\Request\Check;
use app\Utils\AppException;

class CheckMandatoryData
{

	public static function check ($data, $mandatoryData){

		$keys = array_keys($data);

		$result = array_diff($mandatoryData, $keys);

		if($result !== []){
			throw new AppException(reset($result)." is required", 404);
		}

		$emptyKey = array_search("", $data);

		if($emptyKey){
			throw new AppException($emptyKey." is required", 404);
		}

	}
}