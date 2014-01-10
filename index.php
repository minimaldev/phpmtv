<?php

//app constants
define('DS', DIRECTORY_SEPARATOR);
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ .DS);
chdir(dirname(__DIR__));

define('BASE_PATH', realpath(dirname(__FILE__)));
define('FRAMEWORK_PATH',BASE_PATH.DS.'Framework'.DS);
define('CONFIG_PATH',BASE_PATH.DS.'CONFIG'.DS);
define(__NAMESPACE__ ,'111');
//load the autloader
require FRAMEWORK_PATH .'Autoloader.php';

//use Framework\Http\Response\ViewResponse;
//new ViewResponse(BASE_PATH.DS.'views/name.php',array("name"=>"hola"),404);
use Framework\Router\LambdaRouter;
$router = new LambdaRouter;
$router->run();