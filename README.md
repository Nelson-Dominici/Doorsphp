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
  <li>Easy use of routes.</li>
  <li>Routes with URI Params.</li>
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
- `app\AllRoutes.php`: Group all API routes.

## 🌿 How to use

<p>

The creation of the API will revolve around the app\Modules folder, inside which there is the User folder, which is an entity that will serve as an example, now see how to use the API resources using the User folder as an example:

</p>

### 🗺 Routes
<p>

Inside the User folder there is a User Routes.php file, this is where the routes related to the User entity will be (you can create routes without having a specific entity).

</p>


#### 📝 funcPath
<p>
The funcPath field that is passed after you put a uri inside an http method is responsible for saying which method has to be called after the uri is accessed. <br>
	ABSOLUTE path of the file where the class(the class can have any name) is:method name

</p>

#### 👮‍♂️ mandatoryData
<p>
The requiredData field that is passed after you put a uri inside an http method is responsible for saying which REQUEST BODY fields are mandatory. if a mandatory field is empty or not sent, the API will respond with a json stating that the specified field is mandatory and will terminate the API execution (requiring mandatory data from the request body will not work in the GET and HEADE methods).
</p>

```json
{
   "message": "name is required"
}
```
<br>

```php
<?php

return $userRoutes = [

	"POST" => [

		"/user/post" => [	
			"funcPath" => "app/Example/User/UserController:postExample",
			"mandatoryData" => ["name", "email", "password"]
		],
	],

	"GET" => [

		"/" => [	
			"funcPath" => "app/Example/User/UserController:absoluteRouteExample",
		],

		"/user/:uriParam1/example/:uriParam2" => [	
			"funcPath" => "app/Example/User/UserController:uriParamExample",
		],
	],
];
```
<p>
To make these routes work you need to join them (the array) with the array that will join all the API routes, which is in app\AllRoutes.php.
</p>

#### 🔎 NOT-FOUND
<p>
The NOT-FOUND field is required if the route is not found.
</p>

#### ❌ HTTP Methods
<p>
Notice that the routes are being separated from HTTP methods.
</p>

```php

<?php

require_once("app/Example/User/UserRoutes.php");

return [

	"POST" => array_merge(
		$userRoutes["POST"],
	),

	"GET" => array_merge(
		$userRoutes["GET"],
	),

	"NOT-FOUND" => [
		"funcPath" => "app/Example/User/UserController:notFound"
	]
];

```



<h2>🧷 Author</h2>

| [<img src="https://avatars.githubusercontent.com/Nelson-Dominici" width=115><br><sub>Nelson Dominici</sub>](https://github.com/Nelson-Dominici) |
| :---: |
