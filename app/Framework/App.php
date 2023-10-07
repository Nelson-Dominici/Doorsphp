<?php

namespace app\Framework;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");

use app\Framework\Modules\Route\Route;

class App
{
	use Route;
}