<h1 align="center">🚪 Doorsphp 🚪</h1>

<h2>🍄 About</h2>
<p>
Doorsphp is a framework created for student purposes, <strong>with no intention of being used in real projects</strong>.
</p>

<h2>🗺 Routes</h2>  

<p>

Doorsphp has resources to create <strong>HTTP</strong> Routes, using the methods of the App class object, the methods are: <strong>get()</strong>, <strong>post()</strong> , <strong>put()</strong> and <strong>delete()</strong>, each representing their respective <strong>HTTP</strong> methods, these methods must receive two arguments, the first is the <strong>endpoint</strong> of the route and the second is the <strong>controller</strong> of the route.
 
</p>

```php
<?php

require_once("./vendor/autoload.php");

use Doorsphp\App;
use Doorsphp\Route\Request\Request;
use Doorsphp\Route\Response\Response;

$app = new App();

class ExampleClass
{
    public static function exampleMethod(Request $req, Response $res): void 
    {
        $queryParams = $req->queryParams;
        $urlParams = $req->urlParams;

        var_dump($urlParams);
	
        $res->status(200);
    }
};

$app->get("/endpoint/:urlParam", [ExampleClass::class, "exampleMethod"]);

$app->post("/endpoint", function(Request $req, Response $res): void
{
    $queryParams = $req->queryParams;
    $body = $req->body;

    $res->status(200)->sendJson(["success" => true]);
});

```

<h3>🕹 Route controller</h3>  

<p>

There are two ways to place a controller in a route:
 
</p>

<ul>
 <strong><li>Using an array with a Class with the identifier "::class" and a string with the name of the method(method must be static):</li><br></strong>
 
```php

$app->get("/endpoint/:urlParam", [ExampleClass::class, "exampleMethod"]);

```
 
<li><strong>Using an anonymous function:</strong></li><br>
 
```php

$app->post("/endpoint", function(Request $req, Response $res): void
{
    $queryParams = $req->queryParams;
    $body = $req->body;

    $res->status(200)->sendJson(["success" => true]);
});

```

</ul>

<h3>🎲 Dynamic routes</h3>  

<p>

Doorsphp has a feature for creating dynamic routes, to create them just create a route with the root of the route path with ":":

```php

$app->get("/endpoint/:urlParam", [ExampleClass::class, "exampleMethod"]);

```
</p>


<h3>📦 Request Classs</h3>  

<p>

In the Request Class, which is the first parameter of the Controller, you will have access to the data of: <strong>Request Body</strong>, <strong>Url Params</strong> and <strong>Query Params</strong>, <strong>Middleware Data</strong>:

```php

$body = $req->body;
$urlParams = $req->urlParams;
$queryParams = $req->queryParams;
$middlewareData = $req->middlewareData;

```
</p>

<h3>🗳 Response Classs</h3>  

<p>
	
In the Response class, which is the second parameter of the Controller, you will have access to the <strong>sendJson()</strong> method to send a json as a response, and to the <strong>status()</strong> method to send the response status (can you call both at the same time, or just one).

```php

$res->status(200)->sendJson(["success" => true]);

```
</p>

<h3>🔒 Middlewares</h3>  

<ul>
 <li>To return data from one middleware to another, or to your "final" controller, you simply return an associative array (key and value)</li>
 <li>If you call any method of the Response Class in a middleware, the execution of the following middlewares or the "final" controller will be interrupted.</li>
</ul>

<p>

It is possible to apply middlewares to routes, using one or more controllers before your "final" controller.
	
```php

class FirstMiddleware
{

    static public function execute(Request $req, Response $res): void
    {
       // Firs Middleware
    }
	
}

$app->get("/endpoint", 

    [FirstMiddleware::class, "execute"],

    function(Request $req, Response $res): array
    {
        return ["example" => "12345"];
    },

    function(Request $req, Response $res): void
    {
        var_dump($req);
    }
);


```
</p>


<h2>⚙ Requirements</h2>
<ul>
  <li>PHP version =>8.1.13</li>
  <li>composer version =>2.5.1</li>
</ul>

<h2>🔥 Author</h2>

| [<img src="https://avatars.githubusercontent.com/Nelson-Dominici" width=115><br><sub>Nelson Dominici</sub>](https://github.com/Nelson-Dominici) |
| :---: |
