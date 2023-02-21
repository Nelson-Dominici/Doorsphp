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
- `app\Modules`: Responsible for grouping resources for specific entities (the User folder inside it is an example).
- `app\AllRoutes.php`: Group all API routes.

## 🌿 How to use

<p>

The creation of the API will revolve around the app\Modules folder, inside which there is the User folder, which is an entity that will serve as an example, now see how to use the API resources using the User folder as an example:

</p>

### 🗺 Routes
<p>

Inside the User folder there is a User Routes.php file, this is where you will have the routes related to the User entity (you can create routes without having a specific entity), see what's inside:
</p>

```php
<?php

return $userRoutes = [

	"POST" => [

		"/user/post" => [	
			"funcPath" => "User:UserController:postExample",
			"mandatoryData" => ["name", "email", "password"]
		],
	],

	"GET" => [

		"/" => [	
			"funcPath" => "User:UserController:absoluteRouteExample",
		],

		"/user/:uriParam1/example/:uriParam2" => [	
			"funcPath" => "User:UserController:uriParamExample",
		],
	],
];

```
#### 📝 funcPath
<p>
The funcPath field that is passed after you put a uri inside an http method is responsible for saying which method has to be called after the uri is accessed. <br>
	Folder(entity) inside the modules folder<b> : </b> file with the class(class has to be the same name as the file)<b> : </b> method.
</p>

#### 👮‍♂️ mandatoryData
<p>
The mandatoryData field that is passed after you put a uri inside an http method is responsible for saying which fields of the REQUEST BODY are mandatory. if a mandatory field is empty or not sent, it will send a json saying that the specified field is mandatory and terminates the API execution.

</p>



<h2>🧷 Author</h2>

| [<img src="https://avatars.githubusercontent.com/Nelson-Dominici" width=115><br><sub>Nelson Dominici</sub>](https://github.com/Nelson-Dominici) |
| :---: |
