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
  <li>Endpoint access.</li>
  <li>Endpoint with URI Params.</li>
  <li>Easy access to Query Params.</li>
  <li>Access to the body of the request independent of the http method.</li>
  <liBody data protected against xss attacks.</li>
  <li>Possibility of requesting mandatory data in the body of the request.</li>
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

- `bootstrap.php`: Responsible for initializing (those that need to be initialized first) the API dependencies.
- `app\Example`: This folder will serve as an example of how to use the API (you can exclude it).
- `app\NativeResources`: This folder will make all API features work (do not delete).
- `app\AllRoutes.php`: Group all API endpoints.

## 🌿 How to use

<p>

To understand the use of API resources there is the app\Example folder inside it there are some files that will serve as an example. See now how to use the API resources using this folder as an example:

</p>

### 🗺 Routes
<p>

Inside the app\Example\User folder there is a UserRoutes.php file, this is where the routes related to the User will be (you can create routes without relating to anything).

</p>


#### 📝 funcPath
<p>
The funcPath field that is passed after you put an endpoint inside an http method, is responsible for saying the ABSOLUTE path of the class, and the method that will be called after accessing the endpoint. <br>
	ABSOLUTE path of the file where the class(the class can have any name) is:method name
</p>

#### 👮‍♂️ mandatoryData
<p>
The requiredData field that is passed after you put an endpoint inside an http method, is responsible for saying which REQUEST BODY fields are mandatory. if a required field is empty or does not exist, the API will respond with a json stating that the specified field is required and will terminate the API execution (requiring required data from the request body will not work in GET and HEADE methods).
</p>

```json
{
   "message": "name is required"
}
```
<br>

```php
<?php

return $exampleRoutes = [

	"POST" => [

		"/user/post" => [	
			"funcPath" => "app/Example/ExampleController:postExample",
			"mandatoryData" => ["name", "email", "password"]
		],
	],

	"GET" => [

		"/" => [	
			"funcPath" => "app/Example/ExampleController:absoluteRouteExample",
		],

		"/user/:uriParam1/example/:uriParam2" => [	
			"funcPath" => "app/Example/ExampleController:uriParamExample",
		],
	],
];
```
<p>
To make these endpoints work you need to join them (the array) with the array that will join all the API endpoints, which is in app\AllRoutes.php.
</p>

#### 🔎 NOT-FOUND
<p>
The NOT-FOUND field is mandatory, it will be used in case the entered route is not found.
</p>

#### ⚙ HTTP Methods
<p>
Notice that the routes are being separated from HTTP methods.
</p>

```php

<?php

require_once("app/Example/ExampleRoutes.php");

return [

	"POST" => array_merge(
		$exampleRoutes["POST"],
	),

	"GET" => array_merge(
		$exampleRoutes["GET"],
	),

	"NOT-FOUND" => [
		"funcPath" => "app/Example/ExampleController:notFound"
	]
];

```

### 📦 URI Params - Query Params - Request Body

<p>
As stated above, every endpoint needs a funcPath field, as this is where the class path is located, and the method that will be called after accessing the endpoint, and it is in the parameter of this method that the Query Parameters, URI, The Request Body. see the example in the ExampleController.php file.</p>

#### 🧷 Important

<p>

Notice that the class is being returned and instantiated, this is important for the endpoint to work.

</p>


```php

<?php

class ExampleController
{

	public function postExample($req){

		echo "<h1>executing the postExample</h1>";
		var_dump($req);
	}

	public function absoluteRouteExample($req){

		echo "<h1>executing the absoluteRouteExample</h1>";
		var_dump($req);
	}
	
	public function uriParamExample($req){

		echo "<h1>executing the uriParamExample</h1>";
		var_dump($req);
	}

	public function notFound($req){
	
		echo "<h1>Page Not Found</h1>";
		var_dump($req);
	}

}

return new ExampleController();

```


<h2>🧷 Author</h2>

| [<img src="https://avatars.githubusercontent.com/Nelson-Dominici" width=115><br><sub>Nelson Dominici</sub>](https://github.com/Nelson-Dominici) |
| :---: |
