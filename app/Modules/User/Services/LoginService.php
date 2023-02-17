<?php

namespace app\Modules\User\Services;

use app\Utils\AppException;
use app\DataBase\ConnectDB;
use Firebase\JWT\JWT;
use app\Config;

class LoginService extends Config
{

	private static function validData($email, $password){

		$validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

		if(!$validEmail){
			throw new AppException("Email is Invalid", 400);
		}

		if(strlen($password) < 6){
			throw new AppException("password must be greater than 6 characters", 400);
		}
	}

	public static function execute($data){
		
		self::validData($data["email"], $data["password"]);

		$sql = "SELECT * FROM user WHERE email = :email";

		$pdo = ConnectDB::connect()->prepare($sql);
		$pdo->bindValue(":email", $data["email"]);
		$pdo->execute();

		if($pdo->rowCount() < 1){
			throw new AppException("Password or Email are incorrect", 400);
		}

		$user = $pdo->fetch(\PDO::FETCH_ASSOC);

		if(!password_verify($data["password"], $user["password"])){
			throw new AppException("Password or Email are incorrect", 400);
		}

		$payload = [
		    "uuid" => $user["uuid"],
		    "exp" => time() + (8 * 24 * 60 * 60)
		];

		$jwt = JWT::encode($payload, self::JWT_KEY, "HS256");

		return $jwt;
	}
}