<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';
$config = require_once 'application/config/main.php';

use \application\core\{
	Config,
	Router,
	Request
};

Config::setGlobalConfig($config);

Router::route(
	new Request()
);
