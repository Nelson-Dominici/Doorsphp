<?php

namespace app\Framework\Modules\Route\Services\Request\ReqData;

class ReqBody
{
	
	public static function get(): array{
		
		$body = [];

		$nonStandardContent = json_decode(file_get_contents('php://input'), true);

		if(!empty($_POST)){
			$body = $_POST;
		
		}elseif($nonStandardContent !== null) {
			$body = $nonStandardContent;
		}
		
		if($body !== []){
	
			return array_map(function ($input) {
				return htmlspecialchars(strip_tags($input));
			
			}, $body);
		}

		return $body;
	}

}