<?php

namespace Doorsphp\Route\Response;

class Response 
{
	private bool $statusCode = true;

	public function sendJson(array $json): GetRes{
		
		header("Content-Type: application/json; charset=utf-8");
		
		echo json_encode($json);

		exit();
	}

	public function status(string|int $status): GetRes{
		
		if($this->statusCode){
			http_response_code($status);
		}else{
			$this->statusCode = false;
		}

		return $this;
	}
}