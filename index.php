<?php

//app constants
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', realpath(dirname(__FILE__)));
define('FRAMEWORK_PATH', BASE_PATH.DS.'Framework'.DS);
define('CONFIG_PATH', BASE_PATH.DS.'Config'.DS);
define('ROOT_FILENAME', basename(__FILE__));

//load the autloader
require FRAMEWORK_PATH .'Autoloader.php';
use Framework\Router\LambdaRouter;
$router = new LambdaRouter;
$router->run();