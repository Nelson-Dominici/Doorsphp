<?php

namespace app\Framework\Modules\Route\Services;

use app\Framework\Modules\Route\{Request, Response};

class ClosuresHandler
{
	public static function handle(array|callable $closures, Request $request, Response $response): void
	{
		$controller = array_pop($closures);

		foreach ($closures as $middleware) {

		    if (is_array($middleware)) {

		        [$class, $method] = $middleware;

		        $data = call_user_func([$class, $method], $request, $response);
		    } else {

		        $data = $middleware($request, $response);
		    }

		    if ($data !== null) {

			    $request->middlewareData += $data;
		    }
		}

		if (!is_array($controller)) {

		    [$class, $method] = $controller;
		    call_user_func([$class, $method], $request, $response);
		    return;
		} 
		
		$controller($request, $response);
	}
}