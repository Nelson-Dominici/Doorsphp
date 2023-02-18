<?php

namespace app\Modules\User\Services;
use app\Utils\AppException;

class SomeService
{

	public static function execute($requestBodyDate){
		// register, or anything you want

		if(strlen($requestBodyDate["password"]) >= 6){
			return "Successfully registered user";

		}
	
		throw new AppException("password must have at least 6 characters", 401);
	}
}