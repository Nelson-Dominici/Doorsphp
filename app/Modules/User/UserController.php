<?php

namespace app\Modules\User;

class UserController 
{

	public function postExample($req){

		echo "<h1>executing the postExample</h1>";
		var_dump($req);
	}

	public function absoluteRouteExample($req){

		echo "<h1>executing the absoluteRouteExample</h1>";
		var_dump($req);
	}
	
	public function uriParamExample($req){

		echo "<h1>executing the uriParamExample</h1>";
		var_dump($req);
	}

	public function notFound($req){
	
		echo "<h1>Page Not Found</h1>";
		var_dump($req);
	}

}

return new UserController();