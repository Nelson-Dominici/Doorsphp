<?php

return $exampleRoutes = [

	"POST" => [

		"/user/post" => [	
			"funcPath" => "app/Example/ExampleController:postExample",
			"mandatoryData" => ["name", "email", "password"]
		],
	],

	"GET" => [

		"/" => [	
			"funcPath" => "app/Example/ExampleController:absoluteRouteExample",
		],

		"/user/:uriParam1/example/:uriParam2" => [	
			"funcPath" => "app/Example/ExampleController:uriParamExample",
		],
	],
];