<?php

require("bootstrap.php");

// you can delete the example.

use app\NativeResources\Route;

class ClassExample
{
	public function absoluteRoute(array $req){
		var_dump($req);
	}

	public function uriParamasRoute(array $req){
		var_dump($req);
	}

	public function postExample(array $req){
		var_dump($req);
	}
}

Route::post("/example/post", [ClassExample::class, "postExample"]);

Route::get("/example/:uuid", [ClassExample::class, "uriParamasRoute"]);
Route::get("/example/:name/example/:age", [ClassExample::class, "uriParamasRoute"]);

Route::get("/", [ClassExample::class, "uriParamasRoute"]);