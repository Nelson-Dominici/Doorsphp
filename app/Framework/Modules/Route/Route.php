<?php

namespace app\Framework\Modules\Route;

use app\Framework\Modules\Route\Services\RouteTypes\{
	AbsoluteRoute,
	UrlParamsRoute
};

trait Route
{
	private function check(string $routePath, array|callable $closures): void
	{	
		$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

		$absoluteRoute = AbsoluteRoute::check($uri, $routePath);
		$urlParamsRoute = UrlParamsRoute::check($uri, $routePath);

		if ($absoluteRoute || $urlParamsRoute) {
		
			$request = new Request($urlParamsRoute);
			$response = new Response();

			Services\ClosuresHandler::handle($closures, $request, $response);

			exit();
		}
	}

    public function __call(string $method, callable|array $closures): void
    {
    	$requestMethod = strtolower($_SERVER["REQUEST_METHOD"]);

    	if (
	    	$method !== 'get'  && 
	    	$method !== 'put'  && 
	    	$method !== 'post' && 
	    	$method !== 'delete'
		) {
	    	throw new \Exception("The '".$method."' method does not exist.");
    	}

		if ($method == $requestMethod) {

			$routePath = array_shift($closures);

			$this->check($routePath, $closures);		
		}
    }
}