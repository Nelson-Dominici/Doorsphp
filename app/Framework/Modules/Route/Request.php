<?php

namespace app\Framework\Modules\Route;

use app\Framework\Modules\Route\Services\Request\{
	RequestBody,
	QueryParams
};

class Request
{
	public array $middlewareData = [];
	public array $queryParams;
	public array $urlParams;
	public array $body;

	public function __construct(array|false $urlParams)
	{
		$this->queryParams = QueryParams::get();	

		$this->body = RequestBody::get();
		
		$this->urlParams = $urlParams;
	}
}