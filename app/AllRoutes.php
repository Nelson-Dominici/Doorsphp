<?php

require_once("app/Example/ExampleRoutes.php");

return [

	"POST" => array_merge(
		$exampleRoutes["POST"],
	),

	"GET" => array_merge(
		$exampleRoutes["GET"],
	),

	"NOT-FOUND" => [
		"funcPath" => "app/Example/ExampleController:notFound"
	]
];
