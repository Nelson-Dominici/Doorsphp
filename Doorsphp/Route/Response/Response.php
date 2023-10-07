<?php

namespace Doorsphp\Route\Response;

class Response 
{
	public function json(array $data, int $statusCode = 200): void
	{
		
		if (!empty($data)) {

			header("Content-Type: application/json; charset=utf-8");
			echo json_encode($data);
		}

		http_response_code($statusCode);

		exit();
	}
}