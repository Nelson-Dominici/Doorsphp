<?php

namespace app\Modules\User\Services;
use app\DataBase\ConnectDB;
USE app\Utils\AppException;

class UserInfosService
{

	public static function execute($uuid){

		$sql = "SELECT * FROM user WHERE uuid = :uuid";

		$pdo = ConnectDB::connect()->prepare($sql);
		$pdo->bindValue(":uuid", "$uuid");
		$pdo->execute();

		if($pdo->rowCount() < 1){
			throw new AppException("User not Found", 400);
		}

		$user = $pdo->fetch(\PDO::FETCH_ASSOC);

		return $user;
	}

}