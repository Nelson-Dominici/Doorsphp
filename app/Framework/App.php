<?php

namespace app\Framework;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");

class App extends Modules\Route\Route
{

	public function get(string $route, array|callable ...$funcs): void{

		if ($_SERVER["REQUEST_METHOD"] === "GET") {
			$this->check($route, $funcs);
		}
	}

	public function post(string $route, array|callable ...$funcs): void{
	
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$this->check($route, $funcs);
		}	
	}

	public function put(string $route, array|callable ...$funcs): void{
	
		if ($_SERVER["REQUEST_METHOD"] === "PUT") {
			$this->check($route, $funcs);
		}		
	}

	public function delete(string $route, array|callable ...$funcs): void{
	
		if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
			$this->check($route, $funcs);
		}			
	}
}