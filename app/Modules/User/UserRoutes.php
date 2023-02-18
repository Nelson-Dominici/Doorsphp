<?php

return $userRoutes = [

	"POST" => [

		"/user/post" => [	
			"funcPath" => "User:UserController:postExample",
			["name", "email", "password"]
		],
	],

	"GET" => [

		"/" => [	
			"funcPath" => "User:UserController:absoluteRoute",
		],

		"/uriParams/:userName" => [	
			"funcPath" => "User:UserController:uriParam",
		],
	],
];