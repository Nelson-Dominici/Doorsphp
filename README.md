<p align="center" >

 <img style="object-fit: cover;" src="https://user-images.githubusercontent.com/89428967/226063552-ba75bdff-60d2-43b4-acd8-dd8a1dff5903.png" width="220px" height="200px">

</p>

<h2>🚀 About</h2>
<p>
PHP-Framework is a framework created with no intention to be used for the development of other projects.<br>
I created it to put my knowledge into practice.
<p>

<h2>🗺 Routes</h2>  

<p>

The Framework has resources to create <strong>HTTP</strong> Routes, using the methods of the App class object, the methods are: <strong>get()</strong>, <strong>post()</strong> , <strong>put()</strong> and <strong>delete()</strong>, each representing their respective <strong>HTTP</strong> methods, these methods must receive two arguments, the first is the <strong>endpoint</strong> of the route and the second is the <strong>controller</strong> of the route.
 
<p>

```php
<?php

require_once("./vendor/autoload.php");

use app\Framework\App;

use app\Framework\Modules\Route\Services\Response\GetRes as Response;
use app\Framework\Modules\Route\Services\Request\GetReq as Request;

$app = new App();

class ExampleClass
{
	
	public static function exampleMethod(Request $req, Response $res): void 
	{

		$queryParams = $req->queryParams;
		$urlParams = $req->urlParams;
		$body = $req->body;

		var_dump($urlParams);
	
		$res->status(200);

	}

};

$app->get("/endpoint/:urlParam", [ExampleClass::class, "exampleMethod"]);

$app->post("/endpoint", function(Request $req, Response $res): void
{

	$res->status(200)->sendJson(["success" => true]);

});

```

<h3>🕹 Route controller</h3>  

<p>

There are two ways to place a controller in a route:
 
<p>

<ul>
  <li>Using an array with a Class with the identifier "::class" and a string with the name of the method(must be static)</li><br>
 
```php
<?php

require_once("./vendor/autoload.php");

use app\Framework\App;

use app\Framework\Modules\Route\Services\Response\GetRes as Response;
use app\Framework\Modules\Route\Services\Request\GetReq as Request;

$app = new App();

class ExampleClass
{
	
	public static function exampleMethod(Request $req, Response $res): void 
	{

		$queryParams = $req->queryParams;
		$urlParams = $req->urlParams;
		$body = $req->body;

		var_dump($urlParams);
	
		$res->status(200);

	}

};

$app->get("/endpoint/:urlParam", [ExampleClass::class, "exampleMethod"]);

```
 
  <li>Using an array with a Class with the identifier "::class", and a string with the name of the method</li><br>
 
```php
<?php

require_once("./vendor/autoload.php");

use app\Framework\App;

use app\Framework\Modules\Route\Services\Response\GetRes as Response;
use app\Framework\Modules\Route\Services\Request\GetReq as Request;

$app = new App();

$app->post("/endpoint", function(Request $req, Response $res): void
{

	$res->status(200)->sendJson(["success" => true]);

});

```

</ul>

<h2>⚙ Requirements</h2>
<ul>
  <li>PHP version =>8.1.13</li>
  <li>composer version =>2.5.1</li>
</ul>

<h2>🔥 Author</h2>

| [<img src="https://avatars.githubusercontent.com/Nelson-Dominici" width=115><br><sub>Nelson Dominici</sub>](https://github.com/Nelson-Dominici) |
| :---: |
