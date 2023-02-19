<p align="center" >

<img style="object-fit: cover;" src="https://user-images.githubusercontent.com/89428967/219802149-5f759c02-f575-461e-a777-29e5029d55fe.png" width="220px" height="200px">


</p>

<span align="center" >

[![Open Source Love](https://badges.frapsoft.com/os/v2/open-source.png?v=103)](https://github.com/ellerbrock/open-source-badges/)
[![MIT Licence](https://badges.frapsoft.com/os/mit/mit.svg?v=103)](https://opensource.org/licenses/mit-license.php)

</span>

<h2>🚀 About</h2>
<p>
  PHP-API is an api made in pure php, without any dependence, created to serve as a starting point for other APIS, it contains some features that will facilitate the creation of your api such as:
<p>

<ul>
  <li>Easy use of routes.</li>
  <li>Routes with URI Params.</li>
  <li>Easy access to Query Params.</li>
  <li>Access to the body of the request independent of the http method.</li>
  <liBody data protected against xss attacks.</li>
  <li>Possibility to request mandatory data in the body.</li>
</ul>

<h2>⚙ Requirements</h2>
<ul>
  <li>PHP version =>8.1.13</li>
  <li>composer version =>2.5.1</li>
</ul>

## 🌱 Funcionalidades do projeto
I will mention only the files/folders that will be useful for you to create your api:

- `bootstrap.php`: This file is responsible for initializing (those that need to be initialized first) the project's dependencies.
- `app\Handle`: The Handle folder is responsible for handling SPECIFIC parts of the API (DO NOT EXCLUDE THE REQUEST/ROUTE FOLDER).
- `app\Modules`: The Modules folder is responsible for grouping functions for specific entities (the User folder within it is an example).
- `app\Route`: The only relevant thing inside the AllRoutes folder for creating your API is the AllRoutes.php file, responsible for grouping all the API routes.
- `app\Utils`: The Utils folder is responsible for grouping files that can be called throughout the API.


<h2>🧷 Author</h2>

| [<img src="https://avatars.githubusercontent.com/Nelson-Dominici" width=115><br><sub>Nelson Dominici</sub>](https://github.com/Nelson-Dominici) |
| :---: |
