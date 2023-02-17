<?php

namespace app\Modules\User;

use app\Utils\SuccessRes;
use app\Handle\Request\ValidateToken;

class UserController 
{

	public function register($req){

		Services\RegisterService::execute($req["body"]);
		SuccessRes::send("user has been successfully registered", 200);
	}

	public function login($req){

		$jwt = Services\LoginService::execute($req["body"]);
		SuccessRes::send(["jwt" => $jwt], 200);
	}

	public function userInfos($req){

		$payload = ValidateToken::validate();
		$user = Services\UserInfosService::execute($payload->uuid);
		SuccessRes::send(["user" => $user], 200);
	}

}

return new UserController();