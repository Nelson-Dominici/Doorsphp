<?php

namespace app\DataBase;

use app\Utils\AppException;
use app\Config;

class ConnectDB extends Config
{
	private static $connection;

	public static function connect(){

		if(!isset(self::$connection)):
			try {
				self::$connection = new \PDO(
					"mysql:host=".self::HOST.";dbname=".self::DB_NAME, self::DB_USER, 
					self::DB_PASSWORD);
			
			} catch (\PDOException $e) {
				throw new AppException("Something Went Wrong", 500);
			}
			
		endif;
		
		return self::$connection;
	}
}