<?php

return $userRoutes = [

	"POST" => [

		"/user/post" => [	
			"funcPath" => "User:UserController:postExample",
			"mandatoryData" => ["name", "email", "password"]
		],
	],

	"GET" => [

		"/" => [	
			"funcPath" => "User:UserController:absoluteRouteExample",
		],

		"/user/:userName/friend/:friendName" => [	
			"funcPath" => "User:UserController:uriParamExample",
		],
	],
];