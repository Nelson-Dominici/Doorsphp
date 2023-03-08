<p align="center" >

<img style="object-fit: cover;" src="https://user-images.githubusercontent.com/89428967/219802149-5f759c02-f575-461e-a777-29e5029d55fe.png" width="220px" height="200px">


</p>

<span align="center" >

[![Open Source Love](https://badges.frapsoft.com/os/v2/open-source.png?v=103)](https://github.com/ellerbrock/open-source-badges/)
[![MIT Licence](https://badges.frapsoft.com/os/mit/mit.svg?v=103)](https://opensource.org/licenses/mit-license.php)

</span>

<h2>🚀 About</h2>
<p>
PHP-API is an api made in pure php, without any dependencies, created to serve as a starting point for other APIs, it contains some resources that will facilitate the creation of your api, such resources are:
<p>

<ul>
  <li>Route access.</li>
  <li>Route with URL Params.</li>
  <li>Easy access to Query Params.</li>
  <li>Access to the body of the request independent of the http method.</li>
  <liBody data protected against xss attacks.</li>
</ul>

<h2>⚙ Requirements</h2>
<ul>
  <li>PHP version =>8.1.13</li>
  <li>composer version =>2.5.1</li>
</ul>

## 🌱 Structure

<p>
Only the important files/folders for building for your API will be cited.
</p>

- `index.php`: It is the main file where everything will be executed.
- `bootstrap.php`: Responsible for establishing the API settings, and requesting the automatic loading of the composer.
- `app\NativeResources`: This folder will make all API features work (do not delete).

## 🗺 Routes
<p>To use the routes first you have to call the Route class using autoload (note that before calling the bootstrap file it is needed for the composer autoload to work).</p>
  
```php
<?php

require("bootstrap.php");

use app\NativeResources\Route;

```

<p>The route class contains 4 methods (GET, POST, PUT, DELETE), these methods will tell you what the http method of the endpoint will be, in the parameters of these methods you will pass:<p>

<ul>
 
 <li>The Route URI.</li>
 <li>An array an (instantiated) class and the method that will be called when the Route is used.</li>
 
</ul>


```php
<?php

require("bootstrap.php");

use app\NativeResources\Route;

class ClassExample
{
	public static function absoluteRoute(array $req){
		var_dump($req);
	}

	public static function uriParamasRoute(array $req){
		var_dump($req);
	}

	public static function postExample(array $req){
		var_dump($req);
	}
}

$classExample = new ClassExample();

Route::post("/example/post", [$classExample, "postExample"]);

Route::get("/example/:uuid", [$classExample, "absoluteRoute"]);
Route::get("/", [$classExample, "uriParamasRoute"]);

```



## 🎲 Url Params Route 
<p>
To create an Route with UrlParams, you need to pass :(key) after the /, see the example:
</p>

```php
Route::get("/example/:uuid", [$classExample, "uriParamasRoute"]);
Route::get("/example/:name/example/:age", [$classExample, "uriParamasRoute"]);

```
### 📦 URL Params - Query Params - Request Body

<p>
The data: URL Params - Query Params - Request Body, can be accessed in the parameters of the methods that will be called after a Route is accessed (the GET and DELETE methods do not receive the body in the method parameter), see the example:
</p>


```php

class ClassExample
{
	public static function absoluteRoute(array $req){
		var_dump($req);
	}

	public static function uriParamasRoute(array $req){
		var_dump($req);
	}

	public static function postExample(array $req){
		var_dump($req);
	}
}

```


<h2>🧷 Author</h2>

| [<img src="https://avatars.githubusercontent.com/Nelson-Dominici" width=115><br><sub>Nelson Dominici</sub>](https://github.com/Nelson-Dominici) |
| :---: |
