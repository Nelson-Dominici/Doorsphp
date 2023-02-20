<?php

require_once("app/Modules/User/UserRoutes.php");

return [

	"POST" => array_merge(
		$userRoutes["POST"],
	),

	"GET" => array_merge(
		$userRoutes["GET"],
	),

	"NOT-FOUND" => [
		"funcPath" => "User:UserController:notFound"
	]
];
