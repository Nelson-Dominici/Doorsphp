<?php

namespace app\Modules\Route;

use app\Modules\Route\Services\RouteTypes\AbsoluteRoute;
use app\Modules\Route\Services\RouteTypes\UrlParamsRoute;

use app\Modules\Route\Services\Request\GetReq;
use app\Modules\Route\Services\Response\GetRes;

class Route
{

	protected function check(string $route, array|callable $funcs): void{
		
		$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

		$absoluteRoute = AbsoluteRoute::get($uri, $route);
		$uriParamsRoute = UrlParamsRoute::get($uri, $route);

		if($absoluteRoute || $uriParamsRoute){
		
			$req = new GetReq($uriParamsRoute);
			$res = new GetRes();

			Services\CallRouteFunc::call($funcs, [$req, $res]);
			exit();
		}
	}
	
}