<?php

// This is an example

require_once("./vendor/autoload.php");

use app\App;

use app\Modules\Route\Services\Response\GetRes as Response;
use app\Modules\Route\Services\Request\GetReq as Request;

$app = new App();

class Example
{
	public static function example(Request $req, Response $res){
		$queryParams = $req->queryParams;
		$urlParams = $req->urlParams;
		$body = $req->body;

		var_dump($req);
	}

	public static function middleware(Request $req, Response $res){
		echo "executing middleware";
		return ["name" => "Nelson"];
	}
};

$app->get("/", function(Request $req, Response $res){

	$res->status(200)->sendJson([

		"name" =>"Nelson"

	]);
});

$app->get("/example/:urlParam", 

	function(Request $req, Response $res){
		echo "executing middleware";
	},

	[Example::class, "Example"]
);

$app->post("/post", 
	[Example::class, "middleware"],
	[Example::class, "Example"]
);