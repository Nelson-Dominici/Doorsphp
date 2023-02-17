<?php

namespace app\Modules\User\Services;

use app\Utils\AppException;
use app\DataBase\ConnectDB;
use Ramsey\Uuid\Uuid;

class RegisterService
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

		$sql = "SELECT * FROM user WHERE email = :e";

		$pdo = ConnectDB::connect()->prepare($sql);

		$pdo->bindValue(":e", $data["email"]);
		$pdo->execute();

		if($pdo->rowCount() > 0){
			throw new AppException("Email already registered", 400);
		}

		$sql = "INSERT INTO user (name, email, uuid, password) VALUES (?, ?, ?, ?)";

		$pdo = ConnectDB::connect()->prepare($sql);

		$pdo->bindValue(1, $data["name"]);
		$pdo->bindValue(2, $data["email"]);
		$pdo->bindValue(3, Uuid::uuid4()->toString());
		$pdo->bindValue(4, password_hash($data["password"], PASSWORD_DEFAULT));
		$pdo->execute();
	}

}