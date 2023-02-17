<?php

namespace app\Handle\Request;

use app\Utils\AppException;

use app\Config;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ValidateToken extends Config
{
	
	public static function validate(){

		if(!empty($_SERVER["HTTP_AUTHORIZATION"])){

			$token = $_SERVER["HTTP_AUTHORIZATION"];

			try {
				$payload = JWT::decode($token, new Key(self::JWT_KEY, 'HS256'));
				return $payload;

			}catch (\Exception $e) {
				throw new AppException("Invalid Token", 403);
			}

		}
		
		throw new AppException("Invalid Token", 403);
	}
}