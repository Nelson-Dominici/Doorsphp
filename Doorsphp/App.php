<?php

namespace Doorsphp;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");

use Doorsphp\Route\Route;

class App
{
	use Route;
}