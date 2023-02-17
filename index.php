<?php

require("bootstrap.php");

use app\Utils\AppException;
use app\Route\CallFunc;

try {
	
	CallFunc::call();
	
} catch (AppException $e) {
	$e->sendException();
}