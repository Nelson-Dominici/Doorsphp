<?php

namespace app\Modules\User;
use app\Utils\SuccessRes;

class UserController 
{

	public function postExample($req){

		$message = Services\SomeService::execute($req["body"]);
		SuccessRes::send("$message", 200);
	}

	public function absoluteRoute($req){
		var_dump($req);
	}
	
	public function uriParam($req){
		var_dump($req);
	}
}

return new UserController();