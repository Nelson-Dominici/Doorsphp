<?php

namespace app\Utils;

class SuccessRes
{

	public static function send($data, $status){

		header("Content-Type: application/json; charset=utf-8");
		
		http_response_code($status);

		$json = [
			"status" => $status,
			"data" => $data
		];

		echo json_encode($json);
		exit();
	}

}