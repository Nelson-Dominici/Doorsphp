<?php

require("bootstrap.php");

// you can delete the example.

use app\NativeResources\Route;

class ClassExample
{
	public static function absoluteRoute($req){
		var_dump($req);
	}

	public static function uriParamasRoute($req){
		var_dump($req);
	}

	public static function postExample($req){
		var_dump($req);
	}
}

$classExample = new ClassExample();

Route::post("/example/post", [$classExample, "postExample"]);

Route::get("/example/:uuid", [$classExample, "uriParamasRoute"]);
Route::get("/example/:name/example/:age", [$classExample, "uriParamasRoute"]);

Route::get("/", [$classExample, "uriParamasRoute"]);
