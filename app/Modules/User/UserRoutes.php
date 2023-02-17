<?php

return $userRoutes = [

	"POST" => [

		"/user/register" => [	
			"funcPath" => "User:UserController:register",
			["name", "email", "password"]
		],

		"/user/login" => [
			"funcPath" => "User:UserController:login",
			["email", "password"]
		],
	],

	"GET" => [

		"/user/infos" => [
			"funcPath" => "User:UserController:userInfos"
		],
	],

];