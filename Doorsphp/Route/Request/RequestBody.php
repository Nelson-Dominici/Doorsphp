<?php

namespace Doorsphp\Route\Request;

class RequestBody
{
	public static function get(): array
	{

		$body = [];

		$httpMethod = $_SERVER["REQUEST_METHOD"];
		
		if ($httpMethod == "GET" || $httpMethod == "DELETE") {
			
			return $body;
		}

		$nonStandardContent = json_decode(file_get_contents('php://input'), true);

		if (!empty($_POST)) {
		
			$body = $_POST;
		
		} elseif ($nonStandardContent !== null) {
		
			$body = $nonStandardContent;
		}
		
		if ($body !== []) {
	
			return array_map(function ($input) {

				return trim(htmlspecialchars(strip_tags($input)));
			
			}, $body);
		}

		return $body;
	}
}