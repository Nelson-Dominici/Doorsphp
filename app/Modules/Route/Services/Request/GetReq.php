<?php

namespace app\Modules\Route\Services\Request;

class GetReq
{

	public array $queryParams;
	public array $urlParams;
	public array $body = [];

	public function __construct(array|false $urlParams){

		$httpMethod = $_SERVER["REQUEST_METHOD"];

		$this->queryParams = ReqData\QueryParams::get();

		if($httpMethod !== "GET" && $httpMethod !== "DELETE"){
			$this->body = ReqData\ReqBody::get();
		}
		
		$this->urlParams = $urlParams;
	}

}